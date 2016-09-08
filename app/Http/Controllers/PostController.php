<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $posts = Post::paginate(20);
        return view('index')->withPosts($posts);
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('post')->withPost($post);
    }

}
