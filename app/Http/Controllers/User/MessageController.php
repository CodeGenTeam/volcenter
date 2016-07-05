<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\User;

class MessageController extends Controller
{
    public function create(User $receiver, User $sender, Request $request) {
        $receiver->messages()->create([
            'title' => $request->title,
            'content' => $request->message_content,
            'sender_id' => $sender->id
        ]);

        return back();
    }
}
