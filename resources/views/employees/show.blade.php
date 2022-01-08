@extends('layout')

@section('content')
    <div class="container" >
        <div class="row">
            <div class="card mt-5" style="width: 50rem;">
                <center><h3 class="m-2">Employee Information</h3></center>
                <img src="{{$employee->image_path}}"  class="card-img-top img-thumbnail" style="width: 200px; height: 200;" alt="...">
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

                  <span style="color:blue">Hiring Since</span>
                  <p class="card-text">{{$years}} Years, {{$months}} Months, {{$days}} Days</p>

                  <span style="color:blue">Vacations Balance</span>
                  <p class="card-text">{{$vacations_balance}} Day</p>

                  <span style="color:blue">Vacations</span>
                  <p class="card-text">{{$vacation}} Day</p>

                  <span style="color:blue">The remaining holidays</span>
                  <p class="card-text">{{$holidays}} Day</p>
                </div>
              </div>
        </div>
    </div>
@endsection
