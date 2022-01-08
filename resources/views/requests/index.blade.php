@extends('layout')

@section('content')

<center> <h3 class="mt-3">Vacation Requests</h3></center>
<div class="col-md-4 m-3">
    <a href="{{route('vaction-requests-create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Request</a>
</div>
<pre></pre>
<div class="container text-center">
    <div class="row">
 <!-- Optional JavaScript; choose one of the two! -->
 <table class="table table-striped">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">employee_id</th>
         <th scope="col">vacationFrom</th>
         <th scope="col">vacationTo</th>
         <th scope="col">reason</th>
         <th scope="col">Operations</th>
       </tr>
     </thead>
     <tbody>
         @foreach ($requests as $key=>$item)
             <tr>
             <th scope="row">{{$key +1}}</th>
             <td>{{$item->employee->name}}</td>
             <td>{{$item->vacationFrom}}</td>
             <td>{{$item->vacationTo}}</td>
             <td>{{substr($item->reason,0,50)}}</td>
             <td>
                <a class="modal-effect btn btn-info btn-sm" data-effect="effect-scale"
                    data-toggle="modal"
                    href="#exampleModal2" title="تعديل"><i class="fa fa-edit"></i>
                    Edit
                </a>
                <form method="post"action="{{route('requests.destroy',$item->id)}}"style="display: inline-block">
                @csrf()
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                </form>
             </td>
             </tr>
         @endforeach
     </tbody>
 </table>
 <div>{{$requests->links()}}</div>
</div>
</div>
@endsection
