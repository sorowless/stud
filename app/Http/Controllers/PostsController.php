<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPost;
use App\Http\Requests\PostsRequest;
use App\Post;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $objPost=new Post();
        $posts=$objPost->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function add()
    {
        $objCategory=new Category();
        $categories=$objCategory->get();
        return view('posts.add',['categories'=>$categories]);
    }
    public function addRequest(PostsRequest $request)
    {
            $objPost = new Post();
            $objCategoryPost = new CategoryPost();

            $objPost = $objPost->create([
                'title' => $request->input('title'),
                'short_text' => $request->input('short_text'),
                'full_text' => $request->input('full_text'),
                'author' => $request->input('author'),
            ]);

            if($objPost){
                foreach ($request->input('categories') as $category_id){
                    $category_id=(int)$category_id;
                    $objCategoryPost=$objCategoryPost->create([
                        'post_id'=>$objPost->id,
                        'category_id'=>$category_id
                    ]);
                }
                return redirect()->route('posts')->with('success','Добавлено');
            }
            return back()->with('error','Ошибка');
    }
    public function edit(int $id)
    {
        $objCategory=new Category();
        $categories=$objCategory->get();
        $posts=Post::find($id);
        if(!$posts){
            return abort(404);
        }

        $mainCategories=$posts->categories;
        $arrCategories=[];
        foreach ($mainCategories as $category){
            $arrCategories[]=$category->id;
        }

        return view('posts.edit',['categories' => $categories, 'posts'=> $posts, 'arrCategories'=> $arrCategories]);
    }
    public function editRequest(PostsRequest $request,int $id)
    {
        $objPost = Post::find($id);
        if(!$objPost){
            return abort(404);
        }
        $objPost->title=$request->input('title');
        $objPost->short_text=$request->input('short_text');
        $objPost->full_text=$request->input('full_text');
        $objPost->author=$request->input('author');
        if($objPost->save()){
            $objPostCategory=new CategoryPost();
            $objPostCategory->where('post_id',$objPost->id)->delete();
            $arrCategories = $request->input('categories');
            if(is_array($arrCategories)){
                foreach ($arrCategories as $category){
                    $objPostCategory->create(['category_id'=>$category,'post_id'=>$objPost->id]);
                }
            }

            return redirect()->route('posts')->with('success','Изменено');;
        }
        return back()->with('error','Ошибка');
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $id=(int)$request->input('id');
            $objPost=new Post();
            $objPost->where('id',$id)->delete();
            echo "success";
        }
    }
}
