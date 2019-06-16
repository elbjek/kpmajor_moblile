<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class ApiMessageController extends Controller
{
    public function index() 
    {
        $messages = Messages::pluck('message_content')->get();
    }
}
