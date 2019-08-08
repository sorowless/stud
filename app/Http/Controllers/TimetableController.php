<?php

namespace App\Http\Controllers;

use App\Cab;
use App\Category;
use App\CategoryPost;
use App\Clas;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\TimetableRequest;
use App\Lesson;
use App\Subject;
use App\Timetable;
use App\User;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $objTimetable=new Timetable();
        $timetables=$objTimetable->get();
        return view('timetables.index',['timetables'=>$timetables]);
    }

    public function add()
    {
        $objCab=new Cab();
        $cabs=$objCab->get();
        $objUser=new User();
        $users=$objUser->get();
        $objClas=new Clas();
        $classes=$objClas->get();
        $objSubject=new Subject();
        $subjects=$objSubject->get();
        $objLesson=new Lesson();
        $lessons=$objLesson->get();
        return view('timetables.add',['cabs'=>$cabs,
            'users'=>$users,
            'classes'=>$classes,
            'subjects'=>$subjects,
            'lessons'=>$lessons]);
    }
    public function addRequest(TimetableRequest $request)
    {
        $objTimetable = new Timetable();

        $objTimetable = $objTimetable->create([
            'lesson_date' => $request->input('lesson_date'),
            'cab' => $request->input('cab'),
            'teach' => $request->input('teach'),
            'clas' => $request->input('clas'),
            'subj' => $request->input('subj'),
            'lesn' => $request->input('lesn'),
        ]);

        if($objTimetable){

            return redirect()->route('timetable')->with('success','Добавлено');
        }
        return back()->with('error','Ошибка');
    }
    public function edit(int $id)
    {
        $objCab=new Cab();
        $cabs=$objCab->get();
        $objUser=new User();
        $users=$objUser->get();
        $objClas=new Clas();
        $classes=$objClas->get();
        $objSubject=new Subject();
        $subjects=$objSubject->get();
        $objLesson=new Lesson();
        $lessons=$objLesson->get();
        $posts=Timetable::find($id);
        if(!$posts){
            return abort(404);
        }

        return view('timetables.edit',['cabs'=>$cabs,
            'users'=>$users,
            'classes'=>$classes,
            'subjects'=>$subjects,
            'lessons'=>$lessons]);
    }
    public function editRequest(PostsRequest $request,int $id)
    {
        $objPost = Timetable::find($id);
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
            $objPost=new Timetable();
            $objPost->where('id',$id)->delete();
            echo "success";
        }
    }
}
