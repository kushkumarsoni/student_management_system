@extends('layout')
@section('title','Show All Course')
@section('course_select','active')
@section('container')

    <div class="clearfix"></div>
    <div class="card">
      <div class="card-header">
        <h2 class="text-success">List of all Courses</h2>
      </div>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Course Name</th>
          <th scope="col">Created Date</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($course as $crs)
          <tr>
            <td>{{ $crs->id }}</td>
            <td>{{ $crs->name }}</td>
            <td>{{ $crs->created_at }}</td>
            <td><a href="{{ url('course/edit'.'/'.$crs->id) }}" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="{{ url('course/delete'.'/'.$crs->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete it')">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
      {!! $course->links() !!}
    </div>

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