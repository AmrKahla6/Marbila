@extends('layout')

@section('content')

<center> <h3 class="mt-3">Vactions</h3></center>
<div class="col-md-4 m-3">
    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-fall" data-toggle="modal" href="#modaldemo8"> Add New Vacation</a>
</div>
<pre></pre>
<div class="container text-center">
    <div class="row">
 <!-- Optional JavaScript; choose one of the two! -->
 @if (count($vactions) != 0)
 <table class="table table-striped">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Holiday Date</th>
         <th scope="col">Holiday Name</th>
         <th scope="col">Operations</th>
       </tr>
     </thead>
     <tbody>
            @foreach ($vactions as $key=>$item)
                <tr>
                <th scope="row">{{$key +1}}</th>
                <td>{{$item->holidayDate}}</td>
                <td>{{$item->holidayName}}</td>

                <td>
                    <form method="post"action="{{route('vaction.destroy',$item->id)}}"style="display: inline-block">
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
 <div>{{$vactions->links()}}</div>
</div>
    @include('vactions.create')
</div>
@endsection
