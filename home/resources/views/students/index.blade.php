@extends('students.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Registration</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Register</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>date_of_birth</th>
            <th>Class</th>
            <th>Division</th>
            <th>photo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $students)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->date_of_birth }}</td>
            <td>{{ $students->class }}</td>
            <td>{{ $students->division }}</td>
            <td><img src="{{ asset($students->photo) }}" width="50" height="50" class="img img-responsive"></td>
            <td>
                <form action="{{ route('students.destroy',$students->id) }}" method="POST">
   
                    <a class="btn btn-warning" href="{{ route('students.show',$students->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$students->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   @endsection
   {!! $student->links() !!}
   