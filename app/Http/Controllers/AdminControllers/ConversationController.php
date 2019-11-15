<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Client;
use App\User;
use App\Conversation;
use Mail;
class ConversationController extends Controller
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
        $conversations = Conversation::all();
        $title = "Conversations";
        $subTitle = "List Conversations";
        return view('administration.conversations.index',compact('title', 'subTitle' , 'conversations'));
    }

    public function show($id)
    {
        $conversation = Conversation::find($id);
        $conversation->status = 1;
        $conversation->save();
        $response = Conversation::where("conversation_id", $conversation->id)->first();
        if($response != null){
            $conversation->response =$response->text;
        }
        else {
            $conversation->response ="";
        }
         
        $title = "Conversation";
        $subTitle = "Respond To Conversation";
        return view('administration.conversations.show',compact('title', 'subTitle' , 'conversation'));
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
        
    }

    public function create(){
        $title = "Conversations";
        $subTitle = "Créer Conversation";
        return view('administration.conversations.create',compact('title', 'subTitle','countries'));
    }


    public function respond(Request $request,$id)
    {
        Conversation::create([
            "subject" => "reponse",
            "text" => $request["text"],
            "user_id" => auth()->user()->id,
            "status" => 0,
            "conversation_id" => $id
        ]);
        return redirect()->route('conversations.show', ['id' => $id]);
    }
}
