{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection--}}

@extends('layouts.admintemplate')

@section('title', 'Generate Reports')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-6">
    <div class="card card-stats">
        <div class="card-header">
            <h4>Generate Reports</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="startdate">Start Date</label>
                    <input type="date" class="form-control" id="startdate"/>
                </div>
                <div class="col-md-4">
                    <label for="enddate">End Date</label>
                    <input type="date" class="form-control" id="enddate"/>
                </div>
                <div class="col-md-4">
                    <label for="search">Search/label><br/>
                    <button class="btn btn-primary" id="search" onclick="searchthisreport()">Search</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <input type="text" class="form-control" id="totalearning" disabled/>
                <table class="table table-condensed table-striped" id="mainreport">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Control Number</th>
                            <th>Theme</th>
                            <th>Price</th>
                            <th>Date Of Reservation</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-6">
    <div class="card card-stats">
        <div class="card-header">
            <h4>Archived Data</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-striped" id="archivedata">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Control Number</th>
                            <th>Theme</th>
                            <th>Price</th>
                            <th>Date Of Reservation</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
var mainreporttable;
var archivedatatable;
$(document).ready(function(){
    $('#mainreport').DataTable();
    generatereport();
    generatearchivereport();
});
function generatereport(){
    // var startdate = $('#startdate').val();
    // var enddate = $('#enddate').val();
    // if(startdate > '' && enddate > ''){
        $.ajax({
            url: "{{ url('/generatereport') }}",
            method: "GET"
        }).done(function(response){
            if(response.response){
                $('#totalearning').val("Total Earnings ₱ " + response.total);
                mainreporttable = $('#mainreport').DataTable().clear().destroy();
                mainreporttable = $('#mainreport').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    data: response.data,
                    columns: [
                        {"data": "name"},
                        {"data": "mobile"},
                        {"data": "email"},
                        {"data": "control_number"},
                        {"data": "theme"},
                        {"data": "price"},
                        {"data": "date_of_reservation"},
                    ]
                });
            }
        });
    // }else{
    //     toastr.error("Start Date and End Date should not be empty!");
    // }
}

function generatearchivereport(){
    $.ajax({
        url: "{{ url('/getarchivereport') }}",
        method: "GET"
    }).done(function(response){
        if(response.response){
                archivedatatable = $('#archivedata').DataTable().clear().destroy();
                archivedatatable = $('#archivedata').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    data: response.data,
                    columns: [
                        {"data": "name"},
                        {"data": "mobile"},
                        {"data": "email"},
                        {"data": "control_number"},
                        {"data": "theme"},
                        {"data": "price"},
                        {"data": "date_of_reservation"},
                    ]
                });
            }
    });
}

function searchthisreport(){
    var startdate = $('#startdate').val();
    var enddate = $('#enddate').val();
    if(startdate > '' && enddate > ''){
        $.ajax({
            url: "{{ url('/searchthisreport') }}",
            method: "GET",
            data: {
                startdate: startdate,
                enddate: enddate
            }
        }).done(function(response){
            if(response.response){
                $('#totalearning').val("Total Earnings ₱ " + response.total);
                mainreporttable = $('#mainreport').DataTable().clear().destroy();
                mainreporttable = $('#mainreport').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    data: response.data,
                    columns: [
                        {"data": "name"},
                        {"data": "mobile"},
                        {"data": "email"},
                        {"data": "control_number"},
                        {"data": "theme"},
                        {"data": "price"},
                        {"data": "date_of_reservation"},
                    ]
                });
            }
        });
    }else{
        toastr.error("Start Date and End Date should not be empty!");
    }
}

</script>
@endsection
