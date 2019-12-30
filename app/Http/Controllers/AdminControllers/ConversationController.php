<?php

namespace SuperWorks\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use SuperWorks\Http\Controllers\Controller;
use DB;
use SuperWorks\Client;
use SuperWorks\User;
use SuperWorks\Conversation;
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
        $resp = Conversation::create([
            "subject" => "reponse",
            "text" => $request["text"],
            "user_id" => auth()->user()->id,
            "status" => 0,
            "conversation_id" => $id
        ]);
        $conv = Conversation::find($id);
        $conv->conversation_id = $resp->id;
        $conv->save();
        return redirect()->route('conversations.show', ['id' => $id]);
    }
}
