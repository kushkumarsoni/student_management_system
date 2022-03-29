@extends('layout')
@section('title','Add Student')
@section('student_select','active')
@section('container')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
         <div class="card">
            <div class="card-header">
              <h2>Add Student</h2>
            </div>
            <div class="card-body">
               <form method="post" action="{{ url('student/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="sname">Student Name</label>
                  <input type="text" name="sname" class=" form-control" placeholder="Enter student name" value="{{ old('sname') }}">
                  @error('sname')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="fname">Father Name</label>
                  <input type="text" name="fname" class=" form-control" placeholder="Enter father name" value="{{ old('fname') }}">
                  @error('fname')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" id="email" onblur ="checkEmail()" class="form-control" placeholder="Enter email address" value="{{ old('email') }}">
                  <span id="check"></span>
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="class">Class</label>
                  <input type="text" name="class" class="form-control" placeholder="Enter class name" value="{{ old('class') }}">
                  @error('class')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="dob">Date of birth</label>
                  <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                  @error('dob')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select class="form-control" name="gender" value="{{ old('gender') }}">
                      <option value="">--Select Gender--</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                  @error('gender')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="branch">Select Branch</label>
                  <select class="form-control" name="branch" value="{{ old('branch') }}">
                      <option value="">--Select Branch--</option>
                      @foreach($branch as $brnh)
                        <option value="{{ $brnh->id }}">{{ $brnh->name }}</option>
                      @endforeach
                  </select>
                  @error('branch')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="branch">Select Course</label>
                  <select class="form-control" name="course" value="{{ old('course') }}">
                      <option value="">--Select Course--</option>
                      @foreach($course as $crs)
                        <option value="{{ $crs->id }}">{{ $crs->name }}</option>
                      @endforeach
                  </select>
                  @error('course')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>               
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea name="address" class="form-control" placeholder="Enter your address" value="{{ old('address') }}"></textarea>
                  @error('address')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter mobile number" value="{{ old('phone') }}">
                  @error('phone')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control">
                  @error('image')
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
    </div>     
@endsection
@section('script')
  <script type="text/javascript">
    function checkEmail() {
      
      var email = document.getElementById('email').value;
      $.ajax({
        url: "{{ url('student/checkmail') }}",
        type: "GET",
        data: {email:email},
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