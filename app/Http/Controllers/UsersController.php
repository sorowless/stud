<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPost;
use App\Contact;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Post;
use App\Role;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function index(){
        $objUsers=new User();
        $users=$objUsers->get();
        return view('users.index',['users'=>$users]);
    }

    public function edit(int $id)
    {
        $users=User::find($id);
        if(!$users){
            return abort(404);
        }

        return view('profile',['users'=> $users]);
    }
    public function editRequest(UpdateUserRequest $request,$id)
    {
        $users = Post::find($id);
        if(!$users){
            return abort(404);
        }
        $photo=$request->file('photo');
        if($photo!='')
        {
            $image_name=rand().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('images/photos'),$image_name);
        }
        $form_data=array(
            'name' => $request->name,
            'email' => $request->email,
            'FIO' => $request->FIO,
            'phone' => $request->phone,
            'photo' => $image_name,
            'birthdayDate' => $request->birthdayDate,
        );
        User::whereId($id)->update($form_data);
        return redirect()->route('users.edit',$users->id)->with('success','Изменено');
        /*$users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->photo=$request->input('photo');
        $users->phone=$request->input('phone');
        $users->FIO=$request->input('FIO');
        $users->birthdayDate=$request->input('birthdayDate');
        if($users->save()){
            return redirect()->route('user.edit',$users->id)->with('success','Изменено');
        }
        return back()->with('error','Ошибка');*/
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $id=(int)$request->input('id');
            $objUser=new User();
            $objUser->where('id',$id)->delete();
            echo "success";
        }
    }

    public function changeRole(Request $request,int $id){
        $user=User::find($id);
        $user->roles()->detach();
        if($request['role_admin']){
            $user->roles()->attach(Role::where('id','5')->first());
        }
        if($request['role_teacher']){
            $user->roles()->attach(Role::where('id','4')->first());
        }
        if($request['role_student']){
            $user->roles()->attach(Role::where('id','2')->first());
        }
        if($request['role_user']){
            $user->roles()->attach(Role::where('id','1')->first());
        }
        return redirect()->back();
    }
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|string|min:4',
            'FIO' => 'string|min:4|max:150',
            'phone' => 'string|min:4|max:50',
            'photo' => 'sometimes|image|max:50000',
            'birthdayDate' => 'date',
        ]);
    }

    private function storeImage($user)
    {
        if (request()->has('image')) {
            $user->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
            $image = Image::make(public_path('storage/' . $user->image))->fit(300, 300, null, 'top-left');
            $image->save();
        }
    }
}
