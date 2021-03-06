<?php

namespace App\Http\Controllers;

use App\Contact;
use App\MessageReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Contact::orderBy('is_active','ASC')->orderBy('created_at','desc')->paginate(10);
        return view('admin.message.index',compact('posts'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posts=Contact::findOrFail($id);
        return view('admin.message.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=Contact::findOrFail($id);
        MessageReply::create(['contact_id'=>$id,'body'=>$request->body]);
        $user->update(['is_active' => 1]);
        $date=$request->body;
        $user['request']=$date;
        Mail::send('emails.mail_reply', ['user' => $user], function ($m) use ($user) {
            $m->from('a0985265734@gmail', 'Derek blog');

            $m->to($user->email, $user->name)->subject('回復:'.$user->title);
        });
        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $request = $request->search;
        $posts = Contact::orderBy('created_at', 'desc')->where('title', 'LIKE', '%' . $request . '%')->orWhere('body', 'LIKE', '%' . $request . '%')->paginate(10);
        return view('admin.message.index', compact('posts'));
    }

}
