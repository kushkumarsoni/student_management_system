@extends('layout')
@section('title','Show All Student')
@section('student_select','active')
@section('container')

  <div class="clearfix"></div>
  
  <div class="card">
    <div class="card-header">
      <h2 class="text-success">List of all students</h2>
      <form method="get">
        <div class="form-group">
          <input type="text" name="search" placeholder="Search here.." class="col-md-4 form-control">
        <input type="submit" value="Search" class="ml-2 btn btn-success">
        </div>
      </form>
      <div class="col-md-2"><a href="{{ url('student/getAllStudent') }}" class="btn btn-success">Download Pdf</a></div>
      <div class="col-md-2"><a href="{{ url('student/exportExcel') }}" class="btn btn-success">Export Excel</a></div>
      <div class="col-md-2"><a href="{{ url('student/exportCsv') }}" class="btn btn-success">Export CSV</a></div>
    </div>
  </div>
    <table class="table table-bordered table-striped table-responsive">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Student Name</th>
          <th scope="col">Father Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Gender</th>
          <th scope="col">Course Name</th>
          <th scope="col">Branch Name</th>
          <th scope="col">Class</th>
          <th scope="col">DOB</th>
          <th scope="col">Image</th>
          <th scope="col">Address</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($student as $stu)
          <tr>
            <td>{{ $stu->id }}</td>
            <td>{{ $stu->sname }}</td>
            <td>{{ $stu->fname }}</td>
            <td>{{ $stu->email }}</td>
            <td>{{ $stu->phone }}</td>
            <td>{{ $stu->gender }}</td>
            <td>{{ $stu->course->name }}</td>
            <td>{{ $stu->branch->name }}</td>
            <td>{{ $stu->class }}</td>
            <td>{{ $stu->dob }}</td>
            <td><img src="{{ asset('upload'.'/'.$stu->image) }}" width="40" height="40"></td>
            <td>{{ $stu->address }}</td>
            <td><a href="{{ url('student/edit'.'/'.$stu->id) }}" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="{{ url('student/delete'.'/'.$stu->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete it')">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $student->links() }}
     @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session('error') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
@endsection
@section('script')
@endsection