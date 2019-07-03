<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\User;
class ApiMessageController extends Controller
{
    public function index() 
    {
        $user = \Auth::id();
        $loggedUser= \Auth::user();
        $conv = Conversation::with('messages')
        ->join('messages','messages.id','=','conversations.message_id')
        ->join('users','conversations.receiver_id','users.id')
        ->select('conversations.*','messages.message_content','messages.created_at','messages.seen','users.name','users.lastname','users.online','users.profile_picture')
        ->where('conversations.user_id',$user)
        ->orderBy('users.online','desc')
        ->get();
        $data = [$loggedUser,$conv];
        
        return response()->json($data);
    }
    public function conversation(Conversation $conversation) 
    {
        $user = \Auth::id();
        $loggedUser= \Auth::user();
        // $conv = Conversation::with('messages');
        // $data = [$loggedUser,$conv];
        $selectedConv = $conversation->id;
        $conversations = Conversation::with('messages')
        ->where('conversations.id',$selectedConv)
        ->join('users','conversations.receiver_id','users.id')
        // ->select()
        ->first();

        
        return response()->json($conversations);
    }
}
