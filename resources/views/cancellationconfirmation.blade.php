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

@section('title', 'Manage Cancel Request')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-6">
    <div class="card card-stats">
        <div class="card-header">
            <h4>Manage Cancel Request</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-striped" id="managecancelrequest">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Control Number</th>
                            <th>Theme</th>
                            <th>Price</th>
                            <th>Partial Price</th>
                            <th>Is Paid Full</th>
                            <th>Is Paid Partial</th>
                            <th>Date Of Reservation</th>
                            <th>Time Of Reservation</th>
                            <th>Time / Date of Cancellation</th>
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
var managecancelrequest;
$(document).ready(function(){
    loadcancelrequesttable();
    $('#managecancelrequest').DataTable();
});
function loadcancelrequesttable(){
    $.ajax({
        url: "{{ url('/tobecancelled') }}",
        method: "GET"
    }).done(function(response){
        if(response.response){
            managecancelrequest = $('#managecancelrequest').DataTable().clear().destroy();
            managecancelrequest = $('#managecancelrequest').DataTable({
                data: response.data,
                columns: [
                    {"data": "name"},
                    {"data": "mobile"},
                    {"data": "email"},
                    {"data": "control_number"},
                    {"data": "theme"},
                    {"data": "price"},
                    {"data": "partial_price"},
                    {"data": "is_paid_full"},
                    {"data": "is_paid_partial"},
                    {"data": "date_of_reservation"},
                    {"data": "time_of_reservation"},
                    {"data": "date_of_cancellation"}
                ]
            });
        }
    });
}

$(document).on('click', '#managecancelrequest tbody tr', function(){
    var data = managecancelrequest.row(this).data();
    var id = data['id'];
    toastr.error("Do you confirm this deletion? " +"<br/>"+ '<button class="btn btn-danger" onclick="confirmcancellation('+id+')">Yes</button>');
});

function confirmcancellation(id){
    $.ajax({
        url: "{{ url('/confirmcancellation') }}",
        method: "POST",
        data: {
            id: id,
            "_token": "{{ csrf_token() }}"
        },
        beforeSend: function() {
            toastr.info("Please Wait...");
        }
    }).done(function(response){
        // console.log(response);
        if(response.response){
            toastr.success(response.message);
            loadcancelrequesttable();
        }
    });
}

</script>
@endsection
