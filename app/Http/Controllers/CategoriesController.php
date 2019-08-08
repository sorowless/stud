<?php


namespace App\Http\Controllers;


use App\Category;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $objCategory=new Category();
        $categories=$objCategory->get();
        return view('categories.index',['categories'=>$categories]);
    }

    public function add()
    {
        $objCategory=new Category();
        $categories=$objCategory->get();
        return view('categories.add',['categories'=>$categories]);
    }
    public function addRequest(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:50'
            ]);
            $objCategory = new Category();
            $objCategory = $objCategory->create([
                'title' => $request->input('title'),
                'info' => $request->input('info'),
            ]);
            if($objCategory){
                return redirect()->route('categories')->with('success','Добавлено');
            }
            return back()->with('error','Ошибка');

        }catch(ValidationException $e){
            \Log::error($e->getMessage());
            return back()->with('error','Ошибка');
        }
    }
    public function edit(int $id)
    {
        $category=Category::find($id);
        if(!$category){
            return abort(404);
        }
        return view('categories.edit',['category' => $category]);
    }
    public function editRequest(Request $request,int $id)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:50'
            ]);
            $objCategory = Category::find($id);
            if(!$objCategory){
                return abort(404);
            }
            $objCategory->title=$request->input('title');
            $objCategory->info=$request->input('info');
            if($objCategory->save()){
                return redirect()->route('categories')->with('success','Изменено');;
            }
            return back()->with('error','Ошибка');

        }catch(ValidationException $e){
            \Log::error($e->getMessage());
            return back()->with('error','Ошибка');
        }
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $id=(int)$request->input('id');
            $objCategory=new Category();
            $objCategory->where('id',$id)->delete();
            echo "success";
        }
    }
}
