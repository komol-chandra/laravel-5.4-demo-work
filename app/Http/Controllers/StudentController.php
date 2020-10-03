<?php
 
namespace App\Http\Controllers;

use App\Student;
use App\Blood;
use App\ClassName;
use App\Department;
use App\Gender;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{    public function index()
    {
        $student = Student::get();
        $blood = Blood::get();
        $className = ClassName::get();
        $department = Department::get();
        $gender = Gender::get();
        return view('Backend.Student.student',[
            'student'=>$student,
            'blood'=>$blood,
            'className'=>$className,
            'department'=>$department,
            'gender'=>$gender,
        ]);
    }
    public function create(Request $request)
    {
        $student = Student::where(function($query) use($request){
            if ($request->dept) {
                $query->where('department_name', $request->dept);
            }
            if ($request->bg) {
                $query->where('blood_name', $request->bg);
            }
        })
        ->orderBy('student_id', 'asc')->get();
        $blood = Blood::get();
        $className = ClassName::get();
        $department = Department::get();
        $gender = Gender::get();
        return view('Backend.Student.list',[
            'student'=>$student,
            'blood'=>$blood,
            'className'=>$className,
            'department'=>$department,
            'gender'=>$gender,
        ]);
    }
    public function store(StudentRequest $request)
    {
        $data = new Student;
        $data->student_name =$request->student_name;
        $data->student_roll =$request->student_roll;
        $data->blood_name =$request->blood_name;
        $data->department_name=$request->department_name;
        $data->class_name=$request->class_name;
        $data->gender_name=$request->gender_name;
        $data->father_name=$request->father_name;
        $data->mother_name=$request->mother_name;
        $data->birthday=$request->birthday;
        $data->student_email=$request->student_email;
        $data->student_phone=$request->student_phone;
        $data->student_address=$request->student_address;
        $data->save();
        return response()->json(201);
    }
    public function show($id)
    {
        $data = Student::findOrFail($id);
        if($data->status == 1) {
            $data->update(["status"=>0]);
            $status =201;
        }else{
            $data->update(["status"=>1]);
            $status =200;
        } 
        return response()->json($data, $status);
    }
    public function edit($id)
    {
        $blood ['blood'] = Blood::get();
        $className ['className']= ClassName::get();
        $department ['department'] = Department::get();
        $gender ['gender'] = Gender::get();
        $student = Student::findOrFail($id);
        return response()->json($student,201);
    }
    public function studentView($id)
    {
        $blood ['blood'] = Blood::get();
        $className ['className']= ClassName::get();
        $department ['department'] = Department::get();
        $gender ['gender'] = Gender::get();
        $student = Student::findOrFail($id);
        return response()->json($student,201);
    } 
    function update(StudentRequest $request)
    {
        $data = Student::findOrFail($request->student_id);
        $data->student_name =$request->student_name;
        $data->student_roll =$request->student_roll;
        $data->blood_name =$request->blood_name;
        $data->department_name=$request->department_name;
        $data->class_name=$request->class_name;
        $data->gender_name=$request->gender_name;
        $data->father_name=$request->father_name;
        $data->mother_name=$request->mother_name;
        $data->birthday=$request->birthday;
        $data->student_email=$request->student_email;
        $data->student_phone=$request->student_phone;
        $data->student_address=$request->student_address;
        $data->save();
        $status = 201;
        return response()->json($status);
    }
    public function destroy($id)
    {
        $data = Student::findOrFail($id)->delete();
        return response()->json(201);
    }
}
