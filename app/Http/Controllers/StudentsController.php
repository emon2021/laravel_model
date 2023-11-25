<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classs;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        
        $data['student'] = Student::leftJoin('classses','students.class_id','classses.id')
        ->select('students.*','classses.class_name')
        ->orderBy('roll','asc')
        ->get();
        
        return view('students.allStudent',$data);
    }
    public function create()
    {
        $class = new Classs();
        $data['class'] = $class->all();
        return view('students.addStudent',$data);
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'class_name' => 'required',
            'roll' => 'required|integer',
            'email' => 'required|email',
        ]);
        $students = new Student();
        $students->name = $request->name;
        $students->class_id = $request->class_name;
        $students->roll = $request->roll;
        $students->email = $request->email;
        $students->save();
        return redirect()->back()->with('success','Student added successfully!');
    }
    public function destroy(Request $request)
    {
        $id = $request->hidden_id;
        Student::destroy($id);
        return redirect()->back()->with('success','Student deleted successfully!');
    }
    public function edit($id)
    {
        $data['students'] = Student::select('id','name','roll','email')
        ->where('id',$id)
        ->get();
        $data['multi'] = Classs::all();
        return view('students.editStudent',$data);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'class_name' => 'required',
            'roll' => 'required|integer',
            'email' => 'required|email',
        ]);
        
        $students = Student::find($id);
        $students->name = $request->name;
        $students->class_id = $request->class_name;
        $students->roll = $request->roll;
        $students->email = $request->email;
        $students->update();
        // $students = Student::find($id);
        // $students->update([
        //     'name' => $request->name,
        //     'class_id' => $request->class_name,
        //     'roll' => $request->roll,
        //     'email' => $request->email,
        // ]);
        return redirect()->route('students.index')->with('update','Student updated successfully!');
    }
}
