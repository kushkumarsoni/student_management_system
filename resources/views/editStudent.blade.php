@extends('layout')
@section('title','Edit Student')
@section('container')

  <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
         <div class="card">
            <div class="card-header">
              <h2>Update Student</h2>
            </div>
            <div class="card-body">
               <form method="post" action="{{ url('student/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="sname">Student Name</label>
                  <input type="text" name="sname" class="form-control" placeholder="Enter student name" value="{{ $student->sname }}">
                  <input type="hidden" name="id" value="{{ $student->id }}">
                  @error('sname')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="fname">Father Name</label>
                  <input type="text" name="fname" class="form-control" placeholder="Enter father name" value="{{ $student->fname }}">
                  @error('fname')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ $student->email }}">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="class">Class</label>
                  <input type="text" name="class" class="form-control" placeholder="Enter branch name" value="{{ $student->class }}">
                  @error('class')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="dob">Date of birth</label>
                  <input type="date" name="dob" class="form-control" value="{{ $student->dob }}">
                  @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select class="form-control" name="gender">
                      <option value="">--Select Gender--</option>
                      <option value="male" @if($student->gender =='male') selected @endif>Male</option>
                      <option value="female" @if($student->gender =='female') selected @endif>Female</option>
                  </select>
                  @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="branch">Select Branch</label>
                  <select class="form-control" name="branch">
                      <option value="">--Select Branch--</option>
                      @foreach($branch as $branh)
                      <option value="{{ $branh->id }}" @if($student->branch_id == $branh->id) selected @endif>{{ $branh->name }}</option>
                      @endforeach
                  </select>
                  @error('branch')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="branch">Select Course</label>
                  <select class="form-control" name="course">
                      <option value="">--Select Course--</option>
                      @foreach($course as $crs)
                      <option value="{{ $crs->id }}" @if($student->course_id == $crs->id) selected @endif>{{ $crs->name }}</option>
                      @endforeach
                  </select>
                  @error('course')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>               
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea name="address" class="form-control" placeholder="Enter your address">{{ $student->address }}</textarea>
                  @error('address')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter mobile number" value="{{ $student->phone }}">
                  @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control">
                  <img src="{{ asset('upload'.'/'.$student->image)}}" width="40" height="40">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      <div class="col-md-1"></div>
    </div>     
@endsection
@section('script')
@endsection