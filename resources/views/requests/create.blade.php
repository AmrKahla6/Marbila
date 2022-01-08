@extends('layout')

@section('content')
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">Add New Employee</h6>
    </div>
    <form action="{{route('vaction-requests-store')}}" method="post">
        @include('partials._errors')
        @csrf
        <div class="modal-body">
            <div class="form-group mb-2">
                <select name="employee_id"  class="form-control" id="employee_id">
                    <option value="" selected disabled>Choose Employee</option>
                    @foreach ($employees as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-2" style="display: none;" id="classVaction">
                <span style="color:rgb(209, 7, 7)">Number of vacation he was taken (Requests)</span>
                <div class="user-name" id="countVacation"><span class="text-muted f9">Days</span></div>

                <span style="color:rgb(209, 7, 7)">Total Vacation</span>
                <div class="user-name" id="numberOfVacation"><span class="text-muted f9">Days</span></div>

                <span style="color:rgb(209, 7, 7)">The Remaining Holidays</span>
                <div class="user-name" id="remainingHolidays"><span class="text-muted f9">Days</span></div>
            </div>

            <div class="form-group mb-2">
                <span>vacationFrom</span>
                <input type="date" class="form-control" name="vacationFrom" value="{{ old('vacationFrom') }}" id="hireDate" required>
            </div>

            <div class="form-group mb-2">
                <span>vacationFrom</span>
                <input type="date" class="form-control" name="vacationTo" value="{{ old('vacationTo') }}" id="hireDate" required>
            </div>



            <div class="form-group mb-2">
                <span>vacationFrom</span>
                <input type="text" class="form-control" name="reason" value="{{ old('reason') }}" id="hireDate" required>
            </div>

            <div class="form-group mb-2">
                <span>Type</span>
                <input type="text" class="form-control" name="type" value="{{ old('type') }}" id="hireDate" required>
            </div>

        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script>

        $("#employee_id").change(function () {
            var employee_id = $("#employee_id :selected").val()
            $.ajax({
                url: '/employee/info/'+employee_id,
                type: "Get",
                dataType: 'json',//this will expect a json response

                success: function(response){
                    //Number of vaction he take
                    vactions = response.employee['requests'].length
                    $('#countVacation').text(vactions);

                    //Date Of Birth
                    var dateOfBirth = response.employee['dateOfBirth'];
                    console.log(dateOfBirth);

                    //Hiring Date
                    var hireDate = response.employee['hireDate'];
                    console.log(hireDate);

                    //Today Date
                    var today = new Date();
                    var currentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    // console.log(currentDate);

                    //Number of vacation he have
                    const date1 = new Date(hireDate);
                    const date2 = new Date(currentDate);
                    const diffTime = Math.abs(date2 - date1);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    const year     = diffDays/360;

                    if(year >= 10){
                         var numberOfVacation  = 30;
                         var remainingHolidays = numberOfVacation - vactions;
                        $('#numberOfVacation').text(numberOfVacation);
                        $('#remainingHolidays').text(remainingHolidays);
                    }else{
                        var numberOfVacation = 21;
                        var remainingHolidays = numberOfVacation - vactions;
                        $('#numberOfVacation').text(numberOfVacation);
                        $('#remainingHolidays').text(remainingHolidays);
                    }
                    // console.log(diffTime + " milliseconds");
                    // console.log(diffDays + " days");
                    // console.log(year + " year");
                }
            });
            $('#classVaction').show();
        });

    </script>
@endsection
