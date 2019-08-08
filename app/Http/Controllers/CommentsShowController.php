<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class CommentsShowController extends Controller
{
    public function addComment(Request $request){
        try {
            $this->validate($request, [
                'comment' => 'required|string|min:1'
            ]);
            $comment=$request->input('comment');
            $post_id=(int)$request->input('post_id');
            $user_id=auth()->user()->id;

            $objComment=new Comment();
            $objComment=$objComment->create([
                'post_id'=>$post_id,
                'user_id'=>$user_id,
                'comment'=>$comment
            ]);
            if($objComment){
                return back()->with('success','Отправлен на модерацию');
            }
            return back()->with('error','Ошибка');

        }catch(ValidationException $e){
            \Log::error($e->getMessage());
            return back()->with('error','Ошибка');
        }
    }
}
