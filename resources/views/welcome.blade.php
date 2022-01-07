@extends('layout')

@section('content')

<center> <h3 class="mt-3">Employees</h3></center>
<pre></pre>

 <!-- Optional JavaScript; choose one of the two! -->
 <table class="table table-striped">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
         <th scope="col">Address</th>
       </tr>
     </thead>
     <tbody>
         @foreach ($employees as $key=>$item)
             <tr>
             <th scope="row">{{$key +1}}</th>
             <td><a href="{{route('employee.show',$item->id)}}">{{$item->name}}</a></td>
             <td>{{$item->email}}</td>
             <td>{{$item->address}}</td>
             </tr>
         @endforeach
     </tbody>
 </table>
 <div>{{$employees->links()}}</div>
@endsection
