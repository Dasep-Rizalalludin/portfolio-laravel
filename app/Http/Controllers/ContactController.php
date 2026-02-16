<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::send([], [], function ($mail) use ($data) {
            $mail->to('daseprizalreal@gmail.com')
                 ->replyTo($data['email'], $data['name'])
                 ->subject('Pesan dari '.$data['name'])
                 ->html("
                    <h2>Pesan Baru dari Website</h2>
                    <p><strong>Nama:</strong> {$data['name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <hr>
                    <p>{$data['message']}</p>
                 ");
        });

        return back()->with('success', 'Pesan berhasil dikirim');
    }
}
