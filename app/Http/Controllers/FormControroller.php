<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormAdminMail;
use App\Mail\FormUserMail;


class FormControroller extends Controller
{
    public function index()
    {
        return view("email.form.index");
    }

    public function sendMail(ContactFormRequest $request)
    {
        $form_data = $request->validated();

        $email_admin = config('email.admin-mail');
        $email_user = $form_data['email'];

        Mail::to($email_admin)->send(new FormAdminMail($form_data));
        Mail::to($email_user)->send(new FormUserMail($form_data));

        return redirect()->route('form')->with('feedback.success', "Message has been sucsesfully sent to us. If you did not recieve any email from us, please send a message again using a proper email address.");
    }
}
