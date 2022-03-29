<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Branch;
use App\Models\Course;
use Mail;
use PDF;
use App\Exports\StudentExport;
use Excel;

class StudentController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search');
        if($search !=''){
            $student = Student::where('sname','like','%'.$search.'%')->with(['course','branch'])->paginate(5);
        }else{
            $student = Student::with(['course','branch'])->paginate(5);
        }
        return view('student',compact('student'));
    }

    public function addStudent(Request $request) {
        $branch = Branch::all();
        $course = Course::all();
        return view('addStudent',compact('branch','course'));
    }

    public function add(Request $request) {
        
        $request->validate([
            'sname' => 'required|min:3|max:50',
            'fname' => 'required|min:3|max:50',
            'email' => 'required|email',
            'gender' => 'required',
            'branch' => 'required',
            'course' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:10|min:10|max:12',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'class' => 'required|digits:2',
            'dob' => 'required',
        ]);

        $student = new Student;
        $student->sname = $request->input('sname');
        $student->fname = $request->input('fname');
        $student->email = $request->input('email');
        $student->gender = $request->input('gender');
        $student->branch_id = $request->input('branch');
        $student->course_id = $request->input('course');
        $student->address = $request->input('address');
        $student->phone = $request->input('phone');
        $student->dob = $request->input('dob');
        $student->class = $request->input('class');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->extension();
            $new_image = time().".".$ext;
            $image->move('upload/',$new_image);
            $student->image = $new_image;
        }

        if($student->save()) {
            // $user['to'] = "";
            // $data = ['name'=>'Anil Ji','body'=>'hey'];

            // Mail::send('studentmail',$data,function($messages) use ($user){
            //     $messages->to($user['to']);
            //     $messages->subject("This is Verification Email");
            // });

            $request->session()->flash('success','Student Created Successfully!');
            return redirect('student');
        }else {
            $request->session()->flash('error','Student Not Created');
            return redirect('addStudent');
        }
    }    

    public function delete(Request $request) {
        $id = $request->id;
        $st = Student::find($id);
        $path = "upload/".$st->image;
        if(file_exists($path)){
            unlink($path);
        }
    
        $student = $st->delete();
        if($student) {
            $request->session()->flash('success','Student deleted Successfully!');
            return redirect('student');
        }else {
            $request->session()->flash('error','Student Not deleted');
            return redirect('student');
        }
    }

    public function edit(Request $request) {
        $id = $request->id;
        $student = Student::find($id);
        $course = Course::all();
        $branch = Branch::all();
        return view('editStudent',compact('student','branch','course'));
    }

    public function update(Request $request) {

        $request->validate([
            'sname' => 'required|min:3|max:50',
            'fname' => 'required|min:3|max:50',
            'email' => 'required|email',
            'gender' => 'required',
            'branch' => 'required',
            'course' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10|max:12',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'class' => 'required',
            'dob' => 'required',
        ]);

        $id = $request->input('id');
        $data = [
            'sname' => $request->input('sname'),
            'fname' => $request->input('fname'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'branch_id' => $request->input('branch'),
            'course_id' => $request->input('course'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'class' => $request->input('class'),
            'phone' => $request->input('phone'),
            'dob' => $request->input('dob'),
        ];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->extension();
            $new_image = time().".".$ext;
            $image->move('upload/',$new_image);
            $data['image'] = $new_image;
        }


        $student = Student::where('id',$id)->update($data);
        if($student) {
            $request->session()->flash('success','Student Updated Successfully!');
            return redirect('student');
        }else {
            $request->session()->flash('error','Student Not Updated');
            return redirect('student');
        }
    }

    public function checkmail(Request $request) {
        $email = $request->email;
        $check = Student::where('email',$email)->first();
        if($check) {
            return response()->json(['status'=>true,'message'=>'This email already exists']);
        }else {
            return response()->json(['status'=>false,'message'=>'This is available']);
        }
    }

    public function downloadPdf(Request $request) {
        $student = Student::with(['course','branch'])->get();
        $pdf = PDF::loadView('studentpdf',compact('student'));
        return $pdf->download('student.pdf');
    }

    public function exportExcel() {
        return Excel::download(new StudentExport,'student.xlsx');
    }

    public function exportCsv() {
        return Excel::download(new StudentExport,'student.csv');
    }
}
