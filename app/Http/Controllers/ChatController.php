<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{
    public function room($doctorId)
    {
        $doctor = User::findOrFail($doctorId);

        $conversation = Conversation::firstOrCreate([
            'masyarakat_id' => auth()->id(),
            'doctor_id'     => $doctorId,
        ]);

        $messages = $conversation->messages()->orderBy('created_at')->get();

        return view('masyarakat.chat-room', compact('doctor', 'messages', 'conversation'));
    }

    public function send(Request $request, $doctorId)
    {
        $conversation = Conversation::firstOrCreate([
            'masyarakat_id' => auth()->id(),
            'doctor_id'     => $doctorId,
        ]);

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id'       => auth()->id(),
            'message'         => $request->message,
        ]);

        return back();
    }

    public function doctorRoom($conversationId)
    {
        $conversation = Conversation::with(['masyarakat', 'messages.sender'])
            ->where('doctor_id', auth()->id())
            ->findOrFail($conversationId);

        $messages = $conversation->messages()->orderBy('created_at')->get();

        return view('dokter.chat-room', compact('conversation', 'messages'));
    }

    public function doctorSend(Request $request, $conversationId)
    {
        $conversation = Conversation::where('doctor_id', auth()->id())
            ->findOrFail($conversationId);

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id'       => auth()->id(),
            'message'         => $request->message,
        ]);

        // update last_message
        $conversation->update(['last_message' => $request->message]);

        return back();
    }

}