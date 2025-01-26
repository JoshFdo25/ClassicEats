<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.products');
        } elseif (Auth::check()) {
            $categories = Category::all();
            return view('guest.home', compact('categories'));
        }

        $categories = Category::all();
        return view('guest.home', compact('categories'));
    }

    public function contactIndex() 
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.products');
        } elseif (Auth::check()) {
            return view('guest.contact-us');
        }
        return view('guest.contact-us');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::to(env('CONTACT_EMAIL'))->send(new ContactFormMail($details));

        return redirect()->route('contact-us')->with('success', 'Your message has been sent successfully!');
    }

}
