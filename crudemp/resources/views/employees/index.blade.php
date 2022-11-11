@extends('employees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Registration</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Product</a>
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
            <th>email</th>
            <th>Designation</th>
            <th>department</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employee as $employees)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employees->name }}</td>
            <td>{{ $employees->email }}</td>
            <td>{{ $employees->designation }}</td>
            <td>{{ $employees->department }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employees->id) }}" method="POST">
   
                    <a class="btn btn-warning" href="{{ route('employees.show',$employees->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employees->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $employee->links() !!}
      
@endsection