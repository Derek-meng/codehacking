<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //d
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        return redirect('/admin/posts');
        //        return $request->all();

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
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            if ($post->photo) {
                $photo = Photo::find($post->photo->id);
                $input['photo_id'] = $photo->id;
                $photo->file = $name;
                $files = $post->photo->file;
                unlink(public_path() . $files);
                $photo->save();
            } else {
                $photo = Photo::create(['file' => $name]);
                $input['photo_id'] = $photo->id;
            }
        }
//        dd($input);
        $post->update($input);
        return redirect('/admin/posts');
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
        $post = Post::findOrFail($id);
        if ($post->photo) {
            $file = $post->photo->file;
            unlink(public_path() . $file);
        }
        $post->delete();
        Session::flash('deleted_post', '文章已經刪除');
        return redirect('/admin/posts');

    }

    public function post($slug)
    {
        $post = Post::findBySlugOrFail($slug);
        $newpost= Post::orderBy('created_at','DESC')->limit(8)->get();
        return view('post', compact('post', 'comments','newpost'));
    }

    public function homeIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('post.index', compact('posts'));
    }

    public function home_search(Request $request)
    {
        $request = $request->search;
        $posts = Post::orderBy('created_at', 'desc')->where('title', 'LIKE', '%' . $request . '%')->orWhere('body', 'LIKE', '%' . $request . '%')->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function search(Request $request)
    {
        $request = $request->search;
        $posts = Post::orderBy('created_at', 'desc')->where('title', 'LIKE', '%' . $request . '%')->orWhere('body', 'LIKE', '%' . $request . '%')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

}
