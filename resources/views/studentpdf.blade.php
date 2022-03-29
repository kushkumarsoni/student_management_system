<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Download Pdf</title>
	<style type="text/css">
		table {
			  border-collapse: collapse;
			}

			td, th {
			  border: 1px solid #999;
			  padding: 0.5rem;
			  text-align: left;
			}
	</style>
</head>
<body>
	<table>
		<thead>
		  <th scope="col">#</th>
          <th scope="col">Name</th>
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
            <td>{{ $stu->branch->name }}</td>
            <td>{{ $stu->course->name }}</td>
            <td>{{ $stu->class }}</td>
            <td>{{ $stu->dob }}</td>
            <td><img src="{{ asset('upload'.'/'.$stu->image) }}" width="40" height="40"></td>
            <td>{{ $stu->address }}</td>
          </tr>
        @endforeach
      </tbody>
	</table>
</body>
</html>