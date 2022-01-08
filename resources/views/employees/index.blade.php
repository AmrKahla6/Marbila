@extends('layout')

@section('content')

    <center> <h3 class="mt-3">Employees</h3></center>

    <div class="col-md-4 m-3">
        <a href="{{route('employee-create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Employee</a>
    </div>
<pre></pre>
<div class="container text-center">
    <div class="row">
 <!-- Optional JavaScript; choose one of the two! -->

 @if (count($employees) != 0)
 <table class="table table-striped">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
         <th scope="col">Address</th>
         <th scope="col">Operations</th>
       </tr>
     </thead>
     <tbody>
         @foreach ($employees as $key=>$item)
             <tr>
             <th scope="row">{{$key +1}}</th>
             <td><a href="{{route('employee.show',$item->id)}}">{{$item->name}}</a></td>
             <td>{{$item->email}}</td>
             <td>{{$item->address}}</td>
             <td>
                <a class="btn btn-info btn-sm" href="{{route('employee.edit' , $item->id)}}"><i class="fa fa-edit"></i>Edit</a>
                <form method="post" action="{{route('employee.destroy',$item->id)}}" style="display: inline-block">
                @csrf()
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                </form>
             </td>
             </tr>
         @endforeach
     </tbody>
 </table>
 @else
 <h4>No Records</h4>
@endif
 <div>{{$employees->links()}}</div>
</div>
</div>
@endsection
