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

@section('title', 'Manage Reservation')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-6">
    <div class="card card-stats">
        <div class="card-header">
            <h4>Manage Reservation</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-striped" id="managereservationtable">
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
                            <th>Is Done</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="customermodal" tabindex="-1" role="dialog" aria-labelledby="customermodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customermodalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <label id="fullnamecustomer"></label><br/>
            </div>
            <div class="col-md-4">
                <label id="emailcustomer"></label>
            </div>
            <div class="col-md-4">
                <label id="mobilecustomer"></label>
            </div>
            <div class="col-md-12">
                <label id="themecustomer"></label>
            </div>
            <div class="col-md-4">
                <label id="fullpricecustomer"></label>
            </div>
            <div class="col-md-4">
                <label id="halfpricecustomer"></label>
            </div>
            <div class="col-md-4">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="ispaidfullcustomer">Full Paid
                    </label>
                </div>
                <br/>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="ispaidpartialcustomer">Partial Paid
                    </label>
                </div>
                <br/>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="isdonecustomer">Done
                    </label>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savechangescustomer">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->
@endsection


@section('scripts')
<script>
    var managereservationtablee;
    var customerid;
    $(document).ready(function(){
        $('#managereservationtable').DataTable();
        fetchmanagereservation();
    });

    function fetchmanagereservation(){
        $.ajax({
            url: "{{ url('/fetchmanagereservation') }}",
            method: "GET"
        }).done(function(response){
            if(response.response){
                managereservationtablee = $('#managereservationtable').DataTable().clear().destroy();
                managereservationtablee = $('#managereservationtable').DataTable({
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
                        {"data": "is_done"},
                        {"data": null, title: 'Action', wrap: true, "render":
                        function (item) { 
                            return '<div class="btn-group"> <button type="button" onclick="editrecord(' + item.id + ')" value="0" class="btn btn-outline-warning"><i class="nc-icon nc-settings-gear-65" aria-hidden="true"></i></button></div>' 
                        }},
                    ]
                });
            }
        });
    }

    function editrecord(id){
        customerid = id;
        $.ajax({
            url: "{{ url('/getthisrecord') }}",
            method: "GET",
            data: {
                id: id
            }
        }).done(function(response){
            if(response.response){
                $('#customermodal').modal('toggle');
                $('#customermodalLabel').text("");
                $('#customermodalLabel').text("Control Number: " + response.data.control_number);
                $('#fullnamecustomer').text("");
                $('#fullnamecustomer').text("Name: " + response.data.name);
                $('#emailcustomer').text("");
                $('#emailcustomer').text("Email: " + response.data.email);
                $('#mobilecustomer').text("");
                $('#mobilecustomer').text("Mobile: " + response.data.mobile);
                $('#themecustomer').text("");
                $('#themecustomer').text("Theme: " + response.data.theme);
                $('#fullpricecustomer').text("");
                $('#fullpricecustomer').text("Full Price: " + response.data.price);
                $('#halfpricecustomer').text("");
                $('#halfpricecustomer').text("Partial Price: " + response.data.partial_price);
                $('#ispaidfullcustomer').prop("checked", false);
                if(response.data.is_paid_full == "Yes"){
                    $('#ispaidfullcustomer').prop("checked", true);
                }
                $('#ispaidpartialcustomer').prop("checked", false);
                if(response.data.is_paid_partial == "Yes"){
                    $('#ispaidpartialcustomer').prop("checked", true);
                }
                $('#isdonecustomer').prop("checked", false);
                if(response.data.is_done == "Yes"){
                    $('#isdonecustomer').prop("checked", true);
                }
            }
        });
    }

    $(document).on('click', '#savechangescustomer', function(){
        var ispaidfull = $('#ispaidfullcustomer').is(':checked');
        var partialpaid = $('#ispaidpartialcustomer').is(':checked');
        var isdone = $('#isdonecustomer').is(':checked');
        $.ajax({
            url: "{{ url('/updatereservationinformation') }}",
            method: "POST",
            data: {
                id: customerid,
                ispaidfull: ispaidfull,
                ispaidpartial: partialpaid,
                isdone: isdone,
                "_token": "{{ csrf_token() }}",
            }
        }).done(function(response){
            if(response.response){
                toastr.success(response.message);
                $('#customermodal').modal('toggle');
                fetchmanagereservation();
            }
        });
    });

</script>
@endsection
