@extends('layout')

@section('content')
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">Add New Employee</h6>
    </div>
    <form action="{{route('employee.update',$employee->id)}}" method="post" enctype="multipart/form-data">
        @include('partials._errors')
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}" id="Name" placeholder="Employee Name" required>
            </div>
            <div class="form-group mb-2">
                <input type="email" class="form-control" name="email" value="{{ $employee->email }}" id="Email" placeholder="Email">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="address" value="{{ $employee->address }}" id="Address" placeholder="Address" required>
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="jobTitle" value="{{ $employee->jobTitle }}" id="jobtitle" placeholder="Job Title" required>
            </div>
            <div class="form-group mb-2">
                <input type="tel" class="form-control" name="mobile" value="{{ $employee->mobile }}" id="mobile" placeholder="Mobile" required>
            </div>
            <div class="form-group mb-2">
                <span>Birth Date</span>
                <input type="date" class="form-control" name="dateOfBirth" value="{{ $employee->dateOfBirth }}" id="dateOfBirth" required>
            </div>
            <div class="form-group mb-2">
                <span>Hire Date</span>
                <input type="date" class="form-control" name="hireDate" value="{{ $employee->hireDate }}" id="hireDate" required>
            </div>
            <div class="form-group mb-2">
                <label>Employee Image</label>
                <input type="file" name="profileImage"  class="form-control image">
            </div>

            <div class="form-group mb-2">
                <img src="{{$employee->image_path}}" class="img-thumbnail image-preview" style="width: 300px;">
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn ripple btn-primary" type="submit" id="AddUnits"> Save </button>
        </div>
    </form>
</div>
@endsection
