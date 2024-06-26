<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function index()
    {
        $users = User::where('chat_id', '!=',null)->latest()->paginate(20);
        return view('bot.index',[
            'users' => $users,
        ]);
    }
}
