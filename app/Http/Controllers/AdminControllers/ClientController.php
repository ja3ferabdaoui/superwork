<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Client;
use App\User;
use App\Account;
use App\Traits\CountriesTrait;
use Illuminate\Support\Facades\Storage;
use Mail;
class ClientController extends Controller
{
    use CountriesTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all();
        $title = "Clients";
        $subTitle = "List Clients";
        return view('administration.clients.index',compact('title', 'subTitle' , 'clients'));
    }

    public function show($id)
    {
        $client = Client::find($id);
        $accountsTmp = $client->accounts;
        $accounts = array("facebook_account" => array("account_token" => "", "status" => 0),
                          "instagram_account" => array("account_token" => "", "status" => 0),
                          "youtube_account" => array("account_token" => "", "status" => 0),
                          "twitter_account" => array("account_token" => "", "status" => 0),
        );
        foreach($accountsTmp as $account){
            if($account->type == "facebook_account"){
                $accounts["facebook_account"]["account_token"] = $account->account_token;
                $accounts["facebook_account"]["status"] = $account->status;
            }
            elseif($account->type == "instagram_account"){
                $accounts["instagram_account"]["account_token"] = $account->account_token;
                $accounts["instagram_account"]["status"] = $account->status;
            }
            elseif($account->type == "youtube_account"){
                $accounts["youtube_account"]["account_token"] = $account->account_token;
                $accounts["youtube_account"]["status"] = $account->status;
            }
            elseif($account->type == "twitter_account"){
                $accounts["twitter_account"]["account_token"] = $account->account_token;
                $accounts["twitter_account"]["status"] = $account->status;
            }
        }
        $countries = $this->countriesList();
        $title = "Client";
        $subTitle = "Profile Client";
        return view('administration.clients.profile',compact('title', 'subTitle' , 'client','countries','accounts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'username' => 'min:3|unique:users',
            'email' => 'email|unique:users,email',
            'password' => 'confirmed|min:6',
            'first_name' => 'min:3',
            'last_name' => 'min:3'
        ]);
        $client = Client::find($id);
        $type = $request->get('update_part') ;
        if($type == "avatar"){
            $avatar_input = $request->only('avatar');
            if(!empty($user_input['password'])){
                $user_input['password'] = bcrypt($user_input['password']);
            }
            $imageName = $client->avatar;
            $image_extension = "";
            if(!empty($avatar_input['avatar'])){
            $image = $avatar_input["avatar"] ;
            preg_match("/data:image\/(.*?);/",$image,$image_extension); 
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image); 
            $image = str_replace(' ', '+', $image);
            $imageName = 'image_' . $client->user->username . '.' . $image_extension[1];
            Storage::disk('public')->put($imageName,base64_decode($image));
            $avatar_input['avatar']= $imageName;
            $client->update($avatar_input);
        }
        }   
        elseif($type == "connexion"){
            $user_input = $request->only(["username", 'email','password']);
            $client->user->update($user_input);
        }
        elseif($type == "client"){
            $client_input = $request->only(["first_name", 'last_name', 'address', 'country', 'state', 'city']);
            $client->update($client_input);
        }
        elseif($type == "accounts"){
            $accounts_types = $request->only(["facebook_account",'instagram_account','youtube_account','twitter_account']);
            $accounts_status = $request->only(["facebook_account_status","instagram_account_status","youtube_account_status","witter_account_status"]);
            
            foreach($accounts_types as $key=>$value){
                if($value != null){
                    $account = Account::where("client_id",$id)->where("type",$key)->first();
                    if($account){
                        if(array_key_exists($key . "_status", $accounts_status)){
                            //$status = ($accounts_status[$key . "_status"] == "on") ? 1 : 0 ;
                            $status = 1;
                        }
                        else{
                            $status = 0;
                        }
                        $account->update([
                            'account_token' => $value,
                            'status' => $status
                        ]);
                    }
                    else{
                        if(array_key_exists($key . "_status", $accounts_status)){
                            //$status = ($accounts_status[$key . "_status"] == "on") ? 1 : 0 ;
                            $status = 1;
                        }
                        else{
                            $status = 0;
                        }
                        Account::create([
                            'account_token' => $value,
                            'type' => $key,
                            'client_id' => $id,
                            'status' => ($accounts_status[$key . "_status"] == "on") ? 1 : 0 
                        ]);
                    }
                }
            }
        }
        return redirect()->route('clients.show', $id)
                        ->with('success','Client updated successfully');
    }

    public function create(){
        $countries = $this->countriesList();
        $title = "Clients";
        $subTitle = "Créer Client";
        return view('administration.clients.create',compact('title', 'subTitle','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);


        $input = $request->all();
        //dd($input);
        
        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role_id' => 2,
            'status' => 1
        ]);
        $imageName = "default_avatar.png";
        $image_extension = "";
        if($input["avatar"] != null){
            $image = $input["avatar"] ;
            preg_match("/data:image\/(.*?);/",$image,$image_extension); 
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image); 
            $image = str_replace(' ', '+', $image);
            $imageName = 'image_' . $user->username . '.' . $image_extension[1];
            Storage::disk('public')->put($imageName,base64_decode($image));
        }

        $client = Client::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'user_id' => $user->id,
            'address' => $input['address'],
            'country' => $input['country'],
            'state' => $input['state'],
            'city' => $input['city'],
            'avatar' => $imageName

        ]);

        


        
        $accounts_types = $request->only(["facebook_account",'instagram_account','youtube_account','twitter_account']);
        $accounts_status = $request->only(["facebook_account_status","instagram_account_status","youtube_account_status","witter_account_status"]);
        
        foreach($accounts_types as $key=>$value){
            if($value != null){
                    if(array_key_exists($key . "_status", $accounts_status)){
                        //$status = ($accounts_status[$key . "_status"] == "on") ? 1 : 0 ;
                        $status = 1;
                    }
                    else{
                        $status = 0;
                    }
                    Account::create([
                        'account_token' => $value,
                        'type' => $key,
                        'client_id' => $client->id,
                        'status' => $status
                    ]);
                
            }
        }



       

       $data = array('name'=>$user->username);

       Mail::send(['text'=>'mail'], ['data' => $data], function($message) {
          $message->to('jaafar.zbeiba@gmail.com', 'Super fich ')->subject
             ('Laravel Basic Testing Mail');
          $message->from('jaafar.zbeiba@esprit.tn',$data['name']);
       });
        return redirect()->route('clients.index')
                        ->with('success','User created successfully');
    }

    public function lock($id){
        $client = Client::findOrFail($id);
        $client->user->status = 0;
        $client->user->save();
        return \App::make('redirect')->back()->with("success","Client account locked successfully");
    }

    public function unlock($id){
        $client = Client::findOrFail($id);
        $client->user->status = 1;
        $client->user->save();
        return \App::make('redirect')->back()->with("success","Client account locked successfully");
    }
}
