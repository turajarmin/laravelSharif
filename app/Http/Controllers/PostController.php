<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::paginate(2);
        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(createPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $file = $request->file('image');
        if (!empty($file)) {
            $image = $file->getClientOriginalName();
            $pathImage = "images/post/" . $image;
            if (file_exists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move('images/post', $image);
            $post->image = $image;
        }
        $post->save();
        return redirect()->route('Post.create');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit($post)
    {
        $post = Post::findOrFail($post);
        $user = Auth::user();
        if ($user->can('update',$post)) {
            return view('post.edit', compact('post'));
        }else{
            return 'شما دسترسی نخواهید داشت';
        }

    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
