<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Show the form for creating a new feedback.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback()
    {
        return view('account.feedback');
    }

    public function order()
    {
        return view('account.order');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:15',
            'feedback' => 'required|string'
        ]);

        Storage::append('info/feedback.txt', $request->input('name') . ' ' . $request->input('feedback'));
        return Redirect::back()->withErrors(['msg' => 'Hurra']);

    }
    public function ordersave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:15',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'info' => 'required|string|min:5',
        ]);

        Storage::append('info/order.txt', $request->all());
        return Redirect::back()->withErrors(['msg' => 'File save!']);

    }
}
