<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\student;
class studentController extends Controller
{
    public function index(){
        $data=student::get();
   // return $data;
   return view('student-list',compact('data'));
    }
    public function addstudent(){
        return view('add-student');
    }
    public function savestudent(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',

        ]);
        
        $name = $request -> name;
        $email = $request -> email;
        $phone = $request -> phone;
        $address = $request -> address;

        $stu = new student();
        $stu->name = $name;
        $stu->email = $email;
        $stu->phone = $phone;
        $stu->address = $address;
        $stu->save();
        return redirect()->back()->with('success','student added successfully');
        
        
    }
    public function editstudent($id){
         $data=student::where('id','=',$id)->first();
         return view('edit-student',compact('data'));
       
 }
 public function updatestudent(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required',
        'address'=>'required',

    ]);
    $id = $request -> id;
    $name = $request -> name;
    $email = $request -> email;
    $phone = $request -> phone;
    $address = $request -> address;
    student::where('id','=',$id)->update(
        [
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "address" => $address,


        ]
        );
        return redirect()->back()->with('success','student updated successfully');
 }

 public function deletestudent($id)
 {
student::where('id','=',$id)->delete();
return redirect()->back()->with('success','student deleted successfully');
 }
 

}
