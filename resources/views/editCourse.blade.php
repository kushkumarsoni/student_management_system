@extends('layout')
@section('title','Edit Course')
@section('container')

  <div class="page-title">
      <div class="title_left"></div>
      @if(session('success'))
      <h2 class="text-center text-success">{{ session('success') }}</h2>
      @endif
  </div>

  <div class="clearfix"></div>
  <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
         <div class="card">
            <div class="card-header">
              <h2>Udate Branch</h2>
            </div>
            <div class="card-body">
               <form method="post" action="{{ url('course/update') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Course Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter branch name" value="{{ $course->name }}">
                  <input type="hidden" name="id" value="{{ $course->id }}">
                  @error('name')
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