<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use http\Env\Response;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // CREATE API
    public function createEmployee(Request $request)
    {
        // VALIDATION PART.......
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:employees',
            'gender'=>'required',
            'phone_no'=>'required',
            'age'=>'required'
        ]);

        //CREATE DATA PART....
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_no = $request->phone_no;
        $employee->gender = $request->gender;
        $employee->age = $request->age;
        $employee->save();

        //SEND RESPONSE.....
        return response()->json([
           'status'=>1,
           'message'=>'Employee Information Saved Successfully!!!'
        ]);
    }
    // LIST API
    public function listEmployee()
    {
        $employees = Employee::all();
//        return $employees;
        return response()->json([
           'status'=>1,
           'message'=>'Listing Employees Data',
            'data'=>$employees
        ]);
    }
    // SINGLE EMPLOYEE API
    public function getSingleEmployee($id)
    {
        $singleEmployee = Employee::find($id);
        if($singleEmployee){
            return response()->json([
                'status'=>1,
                'message'=>'Employee Found!!!',
                'data'=>$singleEmployee
            ]);
        }else{
            return response()->json([
               'status'=>0,
               'message'=>'Employee Not Found'
            ],404);
        }
    }
    // UPDATE API
    public function updateEmployee(Request $request,$id)
    {
        if(Employee::where('id',$id)->exists())
        {
            $updateEmployee = Employee::find($id);
            $updateEmployee->name = !empty($request->name)?$request->name:$updateEmployee->name;
            $updateEmployee->email = !empty($request->email)?$request->email:$updateEmployee->email;
            $updateEmployee->gender = !empty($request->gender)?$request->gender:$updateEmployee->gender;
            $updateEmployee->age = !empty($request->age)?$request->age:$updateEmployee->age;
            $updateEmployee->phone_no = !empty($request->phone_no)?$request->phone_no:$updateEmployee->phone_no;
            $updateEmployee->update();
            return response()->json([
               'status'=>1,
               'message'=>'Employee Updated Successfully!!!!'
            ]);
        }else{
            return response()->json([
               'status'=>0,
               'message'=>'Employee Not Found'
            ],404);
        }
    }
    // DELETE API
    public function deleteEmployee($id)
    {
        if(Employee::where('id',$id)->exists()){
            $deleteEmployee = Employee::find($id);
            $deleteEmployee->delete();
            return response()->json([
               'status'=>1,
               'message'=>'Employee deleted successfully!!!!'
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>'Employee not found!!'
            ]);
        }
    }
}
