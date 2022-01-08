@extends('layout')

@section('content')

<center> <h3 class="mt-3">Vactions</h3></center>
<pre></pre>
<div class="container text-center">
    <div class="row">
 <!-- Optional JavaScript; choose one of the two! -->
 <table class="table table-striped">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Holiday Date</th>
         <th scope="col">Holiday Name</th>
         <th scope="col">Type</th>
         <th scope="col">Operations</th>
       </tr>
     </thead>
     <tbody>
         @foreach ($vactions as $key=>$item)
             <tr>
             <th scope="row">{{$key +1}}</th>
             <td>{{$item->holidayDate}}</td>
             <td>{{$item->holidayName}}</td>
             @if ($item->type == 0)
                <td>annualVacation</td>
             @else
                <td>suddenVacation</td>
             @endif
             <td>
                <a class="modal-effect btn btn-info btn-sm" data-effect="effect-scale"
                    data-toggle="modal"
                    href="#exampleModal2" title="تعديل"><i class="fa fa-edit"></i>
                    Edit
                </a>
                <form method="post"action=""style="display: inline-block">
                @csrf()
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                </form>
             </td>
             </tr>
         @endforeach
     </tbody>
 </table>
 <div>{{$vactions->links()}}</div>
</div>
</div>
@endsection
