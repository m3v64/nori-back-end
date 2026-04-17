<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        ContactMessage::create($request->validated());

        return redirect()->route('contact')->with('success', 'Your message has been sent! We will get back to you soon.');
    }

    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.messages', ['messages' => $messages]);
    }

    public function show(ContactMessage $message)
    {
        if (!$message->isRead()) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.message-show', ['message' => $message]);
    }
}
