@extends('layout')

@section('content')
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">Add New Employee</h6>
    </div>

    <form action="{{route('employee-store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="name" id="Name" placeholder="Employee Name">
            </div>
            <div class="form-group mb-2">
                <input type="email" class="form-control" name="email" id="Email" placeholder="Email">
            </div>
            <div class="form-group mb-2">
                <input type="email" class="form-control" name="address" id="Address" placeholder="Address">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="jobTitle" id="jobtitle" placeholder="Job Title ">
            </div>
            <div class="form-group mb-2">
                <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
            </div>
            <div class="form-group mb-2">
                <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" placeholder="Date Of Birth">
            </div>
            <div class="form-group mb-2">
                <input type="date" class="form-control" name="hireDate" id="hireDate" placeholder="Hire Date">
            </div>
            <div class="form-group mb-2">
                <label>Employee Image</label>
                <input type="file" name="profileImage" class="form-control image">
            </div>

            <div class="form-group mb-2">
                <img src="" class="img-thumbnail image-preview" style="width: 300px;">
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn ripple btn-primary" type="submit" id="AddUnits"> Save </button>
        </div>
    </form>
</div>
@endsection
