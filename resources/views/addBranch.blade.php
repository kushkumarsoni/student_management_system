@extends('layout')
@section('title','Add Branch')
@section('barnch_select','active')
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
              <h2>Add Branch</h2>
            </div>
            <div class="card-body">
               <form method="post" action="{{ url('branch/add') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Branch Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter branch name" id="branch" onblur="checkBranchName()" value="{{ old('name') }}">
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
    </div>

@endsection
@section('script')

  <script type="text/javascript">
    function checkBranchName() {
      
      var branch = document.getElementById('branch').value;
      $.ajax({
        url: "{{ url('branch/checkbranch') }}",
        type: "GET",
        data: {branch:branch},
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