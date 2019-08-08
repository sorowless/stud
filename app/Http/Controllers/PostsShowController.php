<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\helpers;

class PostsShowController extends Controller
{
    public function index(){
        $objPost=new Post();
        $posts = $objPost->orderBy('id','desc')->paginate(3);

        return view('blog',['posts'=> $posts]);
    }

    public function showPost(int $id,$slug)
    {
        $objPost = Post::find($id);
        if (!$objPost) {
            return abort(404);
        }
        $comments = $objPost->comments()->where('status', 1)->get();


        return view('showpost', ['post' => $objPost, 'comments' => $comments]);
    }
}
