<?php

namespace SuperWorks\Http\Controllers\ClientControllers;

use Illuminate\Http\Request;
use SuperWorks\Http\Controllers\Controller;
use DB;
use SuperWorks\Client;
use SuperWorks\Admin;
use Mail;
use SuperWorks\User;
use SuperWorks\Conversation;
use Auth;
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
        $this->middleware('client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $conversations = Conversation::where('user_id', $id)->get();
        $title = "Conversations";
        $subTitle = "List Conversations";
        return view('clients.conversations.index',compact('title', 'subTitle' , 'conversations'));
    }

    public function show($id)
    {
        $conversation = Conversation::find($id);
        $conversation->status = 1;
        $conversation->save();
        $response = Conversation::where("conversation_id", $conversation->id)->first();
        if($response != null){
            $conversation->response =$response->text;
            $conversation->admin = Admin::where('id',$response->user_id)->first();
        }
        else {
            $conversation->response ="";
        }

        $title = "Conversation";
        $subTitle = "Mon Conversation";
        return view('clients.conversations.show',compact('title', 'subTitle' , 'conversation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Conversation::create([
            "subject" => $request["subject"],
            "text" => $request["text"],
            "user_id" => auth()->user()->id,
            "status" => 0,
            "conversation_id" => null
        ]);
        $data = array('name'=>auth()->user()->username);
        $mailclient=auth()->user()->email;
        $mailuser=auth()->user()->username;
        Mail::send(['text'=>'mail'], ['data' => $data], function($message) use($mailclient,$mailuser) {
           $message->to('contactapi@superworks.fr', 'Super fich ')->subject
              ('Nouveau message de la part '.$mailuser);
           $message->from($mailclient);
        });
        return redirect()->route('client.conversations');
    }

    public function create(){
        $title = "Conversations";
        $subTitle = "Ajouter Conversation";
        return view('clients.conversations.create',compact('title', 'subTitle'));
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
