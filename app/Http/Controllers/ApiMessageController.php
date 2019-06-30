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
        ->where('messages.user_id',$user)
        ->latest('messages.id')
        ->get();
        $data = [$loggedUser,$conv];
        
        return response()->json($data);
    }
    public function conversation() 
    {
        $user = \Auth::id();
        $loggedUser= \Auth::user();
        $conv = Conversation::with('messages');
        $data = [$loggedUser,$conv];
        
        return response()->json($conv);
    }
}
