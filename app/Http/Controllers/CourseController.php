<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request) {
        $course = Course::paginate(5);
        return view('course',compact('course'));
    }

    public function addCourse(Request $request) {
        return view('addCourse');
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $branch = new Course;
        $branch->name = $request->input('name');
        if($branch->save()) {
            $request->session()->flash('success','Course Created Successfully!');
            return redirect('course');
        }else {
            $request->session()->flash('error','Course Not Created');
            return redirect('course');
        }
    }

    public function delete(Request $request) {
        $id = $request->id;
        $course = Course::where('id',$id)->delete();
        if($course) {
            $request->session()->flash('success','Course deleted Successfully!');
            return redirect('course');
        }else {
            $request->session()->flash('error','Course Not deleted');
            return redirect('course');
        }
    }

    public function edit(Request $request) {
        $id = $request->id;
        $course = Course::find($id);
        return view('editCourse',compact('course'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' =>'required',
        ]);
        $id = $request->input('id');
        $data = [
            'name' => $request->input('name'),
        ];
        $course = Course::where('id',$id)->update($data);
        if($course) {
            $request->session()->flash('success','Course Updated Successfully!');
            return redirect('course');
        }else {
            $request->session()->flash('error','Course Not Updated');
            return redirect('course');
        }
    }

     public function checkcourse(Request $request) {
        $name = $request->course;
        $check = Course::where('name',$name)->first();
        if($check) {
            return response()->json(['status'=>true,'message'=>'This Course already exists']);
        }else {
            return response()->json(['status'=>false,'message'=>'This is available']);
        }
    }
}
