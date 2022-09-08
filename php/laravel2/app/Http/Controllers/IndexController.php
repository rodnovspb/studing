<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index(){

        $posts = Post::query()->orderBy('created_at', "DESC")->limit(3)->get();

        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    public function showContactForm(){
        return view('contact_form');
    }

    public function contactForm(ContactFormRequest $request){
        Mail::to('rodnovspb@mail.ru')->send(new ContactForm($request->validated()));

        return redirect(route('contacts'));
    }
}
