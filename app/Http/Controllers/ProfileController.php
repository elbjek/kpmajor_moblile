<?php

namespace App\Http\Controllers;
use App\Message;
use App\Conversation;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user =\Auth::id();
        $conv = Conversation::with('messages')->join('messages','messages.id','=','conversations.message_id')
        ->join('users','conversations.receiver_id','users.id')
        ->select('conversations.*','messages.message_content','messages.created_at','users.name','users.lastname','users.online')
        ->where('messages.user_id',$user)
        ->latest('messages.id')
        ->get();
        dd($conv);
        return view('profile');
    }
}
