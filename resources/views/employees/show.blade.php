@extends('layout')

@section('content')
    <div class="container text-center" style="margin-left: 500px">
        <div class="row">
            <div class="card mt-5" style="width: 18rem;">
                <img src="{{$employee->image_path}}" width="100" height="200" class="card-img-top" alt="...">
                <div class="card-body">
                    <span style="color:blue">Name</span>
                  <h5 class="card-title">{{$employee->name}}</h5>

                  <span style="color:blue">Address</span>
                  <p class="card-text">{{$employee->address}}.</p>

                  <span style="color:blue">Mobile</span>
                  <p class="card-text">{{$employee->mobile}}.</p>

                  <span style="color:blue">Email</span>
                  <p class="card-text">{{$employee->email}}.</p>

                  <span style="color:blue">Job Title</span>
                  <p class="card-text">{{$employee->jobTitle}}.</p>

                  <span style="color:blue">Date Of Birth</span>
                  <p class="card-text">{{$employee->dateOfBirth}}.</p>

                  <span style="color:blue">Hire Date</span>
                  <p class="card-text">{{$employee->hireDate}}.</p>

                </div>
              </div>
        </div>
    </div>
@endsection
