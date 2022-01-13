<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        //Validation of data..
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required|email|unique:students',
           'password'=>'required|confirmed',
        ]);
        //create data
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->phone_no = isset($request->phone_no)? $request->phone_no : "";
        $student->save();
        //send response
        return response()->json([
           'status'=>1,
           'message' => 'Student Registered Successfully!!!'
        ]);
    }
    public function login(Request $request)
    {

    }
    public function profile()
    {

    }
    public function logout()
    {

    }
}
