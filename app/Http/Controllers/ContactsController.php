<?php

namespace App\Http\Controllers;

use App\Contact;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function index()
    {
        $objContact=new Contact();
        $contacts=$objContact->get();
        return view('backcalls.index',['contacts'=>$contacts]);
    }

    public function addRequest(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:50',
                'info' => 'required|string|min:4',
                'emailphone' => 'required|string|min:4|max:50'
            ]);
            $objContact = new Contact();
            $objContact = $objContact->create([
                'title' => $request->input('title'),
                'info' => $request->input('info'),
                'emailphone' => $request->input('emailphone'),
            ]);
            if($objContact){
                return redirect()->route('contacts')->with('success','Отправлено');
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
            $objContacts=new Contact();
            $objContacts->where('id',$id)->delete();
            echo "success";
        }
    }
}
