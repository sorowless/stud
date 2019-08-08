<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(){
        $comments=(new Comment())->get();
        $params=[
          'comments'=>$comments
        ];
        return view('comments.index',$params);
    }

    public function acceptComment($id){
        \DB::table('comments')->where('id', $id)->update(['status'=>true]);
        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $id=(int)$request->input('id');
            $objComment=new Comment();
            $objComment->where('id',$id)->delete();
            echo "success";
        }
    }
}
