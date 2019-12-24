<?php
namespace App\Http\Controllers\ClientControllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Client;
use App\User;
use App\Account;
use App\Traits\CountriesTrait;
use Illuminate\Support\Facades\Storage;
use Mail;
use Auth;
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
        $this->middleware('client');
    }

    public function profile()
    {
        $id = Auth::user()->userAccount->id;
        $client = Client::find($id);
        $countries = $this->countriesList();
        $title = "Profile";
        $subTitle = "Mon Profile";
        return view('clients.profile',compact('title', 'subTitle' , 'client','countries'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        $id = Auth::user()->userAccount->id;
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
            $client_input = $request->only(["first_name", 'last_name', 'address', 'country', 'phone', 'city']);
            $client->update($client_input);
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

    public function showFacebook()
    {
          return view('users.dashboard.facebook');

    }
}
