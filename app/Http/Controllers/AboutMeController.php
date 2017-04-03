<?php

namespace App\Http\Controllers;

use App\AboutMe;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberFormatter;

class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = AboutMe::all();
        return view('admin.aboutme.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.aboutme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        AboutMe::Create($request->all());
        return redirect('/admin/aboutme');
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
        $post = AboutMe::findOrFail($id);
        return view('admin.aboutme.edit', compact('post'));
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
        $post = AboutMe::findOrFail($id);
        $post->update($request->all());
        return redirect('/admin/aboutme');
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
        $sussece = AboutMe::destroy($id);
        if (!$sussece)
            return redirect('/admin/aboutme');
        else {
            Session::flash('error', '刪除失敗');
            return redirect()->back();
        }
    }

    public function aboutme()
    {
        $post_acount = count(Post::all());
        $post = AboutMe::where('is_active', '=', 1)->orderBy('updated_at', 'desc')->get()->first();
        $post->body = str_replace("\r\n", "<br>", $post->body);
        $categorys = Category::pluck('name', 'id');
        $categorys_all_count = [];
        foreach ($categorys as $key => $value) {
            $count = count(Category::find($key)->post);
            array_push($categorys_all_count, $count);
        }
        $categorys = Category::pluck('name');
        for ($i = 0; $i < sizeof($categorys_all_count); $i++) {
            $categorys_all_count[$i] = $categorys_all_count[$i] / $post_acount;
            $formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
            $categorys_all_count[$i] = ($formatter->format($categorys_all_count[$i]));
        }
        $categorys->categorys_all_count = $categorys_all_count;
        return view('post.post-about', compact('post', 'categorys'));
    }
}
