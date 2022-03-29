@extends('layout')
@section('title','Add Course')
@section('course_select','active')
@section('container')

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
         <div class="card">
            <div class="card-header">
              <h2>Add Course</h2>
            </div>
            <div class="card-body">
               <form method="post" action="{{ url('course/add') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Course Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter course name" value="{{ old('name') }}" id="course" onblur="checkCourseName()">
                  <span id="check"></span>
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      <div class="col-md-1"></div>
      @if(session('success'))
        <h2 class="text-center text-success">{{ session('success') }}</h2>
        @endif
    </div>

@endsection
@section('script')

<script type="text/javascript">
    function checkCourseName() {
      var course = document.getElementById('course').value;
      $.ajax({
        url: "{{ url('course/checkcourse') }}",
        type: "GET",
        data: {course:course},
        dataType: "json",
        success: function(data){
          if(data.status == true) {
            $('#check').text(data.message);
            $('#check').addClass('text-danger');
          } if(data.status == false){
            $('#check').text(data.message);
            $('#check').removeClass('text-danger');
            $('#check').addClass('text-success');
          }
        }
      });
    }
  </script>
@endsection