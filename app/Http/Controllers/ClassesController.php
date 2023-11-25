<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;


class ClassesController extends Controller
{
    public function index()
    {
        $class['data'] = Classs::all();
        return view('classes.allClass',$class);
    }
    public function create()
    {
        return view('classes.addClass');
    }
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|min:3',
        ]);
        // $data = array(
        //     'class_name' => $request->class_name,
        // );
       $class = Classs::where('class_name',$request->class_name)->first();
       if($class ==true){
        return redirect()->back()->with('exist','The class is already exist!');
       }
       $class = new Classs;
       $class->class_name = $request->class_name;
       $class->save();
        return redirect()->back()->with('success','Data Inserted!');
    }
}
