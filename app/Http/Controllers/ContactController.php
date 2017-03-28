<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactBlog;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('post.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactBlog $request)
    {
        //
//        dd($request->all());
//        $mail = $request->all();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'body' => $request->body,
        ];
        Contact::create($request->all());
        Session::flash('sent_masseage', '已經成功寄出');
        mail::send('emails.mail', $data, function ($message) {

            $message->to('a0985265734@gmail.com','Derek_blog')->subject('Contact Me');
        });
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
