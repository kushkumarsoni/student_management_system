<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index(Request $request) {
        $branch = Branch::paginate(5);
        return view('branch',compact('branch'));
    }

    public function addBranch(Request $request) {
        return view('addBranch');
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $branch = new Branch;
        $branch->name = $request->input('name');
        if($branch->save()) {
            $request->session()->flash('success','Branch Created Successfully!');
            return redirect('branch');
        }else {
            $request->session()->flash('error','Branch Not Created');
            return redirect('branch');
        }
    }

    public function delete(Request $request) {
        $id = $request->id;
        $branch = Branch::where('id',$id)->delete();
        if($branch) {
            $request->session()->flash('success','Branch deleted Successfully!');
            return redirect('branch');
        }else {
            $request->session()->flash('error','Branch Not deleted');
            return redirect('branch');
        }
    }

    public function edit(Request $request) {
        $id = $request->id;
        $branch = Branch::find($id);
        return view('editBranch',compact('branch'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' =>'required',
        ]);
        $id = $request->input('id');
        $data = [
            'name' => $request->input('name'),
        ];
        $branch = Branch::where('id',$id)->update($data);
        if($branch) {
            $request->session()->flash('success','Branch Updated Successfully!');
            return redirect('branch');
        }else {
            $request->session()->flash('error','Branch Not Updated');
            return redirect('branch');
        }
    }

    public function checkbranch(Request $request) {
        $name = $request->branch;
        $check = Branch::where('name',$name)->first();
        if($check) {
            return response()->json(['status'=>true,'message'=>'This Branch already exists']);
        }else {
            return response()->json(['status'=>false,'message'=>'This is available']);
        }
    }
}
