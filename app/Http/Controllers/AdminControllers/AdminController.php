<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Storage;

use Mail;
class AdminController extends Controller
{
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
        $admins = Admin::all();
        $title = "Administrateurs";
        $subTitle = "Liste Des Administrateurs";
        return view('administration.admins.index',compact('title', 'subTitle' , 'admins'));
    }


    public function show($id)
    {
        $admin = Admin::find($id);
        $title = "Administrateur";
        $subTitle = "Profile Administrateur";
        return view('administration.admins.profile',compact('title', 'subTitle' , 'admin'));

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
        $admin = Admin::find($id);
        $type = $request->get('update_part') ;

        if($type == "avatar"){
            $avatar_input = $request->only('avatar');
            if(!empty($user_input['password'])){
                $user_input['password'] = bcrypt($user_input['password']);
            }
            $imageName = $admin->avatar;
            $image_extension = "";
            if(!empty($avatar_input['avatar'])){
            $image = $avatar_input["avatar"] ;
            preg_match("/data:image\/(.*?);/",$image,$image_extension);
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'image_' . $admin->user->username . '.' . $image_extension[1];
            Storage::disk('public')->put($imageName,base64_decode($image));
            $avatar_input['avatar']= $imageName;
            $admin->update($avatar_input);
        }
        }
        elseif($type == "connexion"){
            $user_input = $request->only(["username", 'email','password']);
            $admin->user->update($user_input);
        }
        elseif($type == "admin"){
            $admin_input = $request->only(["first_name", 'last_name']);
            $admin->update($admin_input);
        }

        return redirect()->route('admins.show', $id)
                        ->with('success','Admin updated successfully');
    }


    public function create(){
        $title = "Administrateurs";
        $subTitle = "Créee Administrateurs";
        return view('administration.admins.create',compact('title', 'subTitle'));
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
        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role_id' => 1,
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
        $admin = Admin::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'user_id' => $user->id,
            'avatar' => $imageName
        ]);

       $data = array('username'=>$user->username);

       Mail::send(['text'=>'mail'], $data, function($message) {
          $message->to('jaafar.zbeiba@gmail.com', 'Super fich ')->subject
             ('Laravel Basic Testing Mail');
          $message->from('jaafar.zbeiba@esprit.tn');
       });
       echo "Basic Email Sent. Check your inbox.";
        return redirect()->route('admins.index')
                        ->with('success','Compte administrateur crée avec succée');
    }


    public function lock($id){
        $admin = Admin::findOrFail($id);
        $admin->user->status =0;
        $admin->user->save();
        return \App::make('redirect')->back()->with("success","Admin account locked successfully");
    }

    public function unlock($id){
        $admin = Admin::findOrFail($id);
        $admin->user->status =1;
        $admin->user->save();
        return \App::make('redirect')->back()->with("success","Admin account locked successfully");
    }
}
