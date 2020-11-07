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

@section('title', 'Manage Users')

@section('content')
@if(Auth::user()->positions_id == 1)
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-body ">
        <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-book-bookmark text-warning"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                    <p class="card-category">Reservation</p>
                    <p class="card-title">150<p>
                </div>
            </div>
        </div>
    </div>
        <div class="card-footer ">
            <hr>
            <div class="stats">
                <i class="fa fa-refresh"></i>
                Update Now
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-body ">
        <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-alert-circle-i text-warning"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                    <p class="card-category">Cancel Reservation</p>
                    <p class="card-title">150<p>
                </div>
            </div>
        </div>
    </div>
        <div class="card-footer ">
            <hr>
            <div class="stats">
                <i class="fa fa-refresh"></i>
                Update Now
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-body ">
        <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-box text-warning"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                    <p class="card-category">Confirm Reservation</p>
                    <p class="card-title">150<p>
                </div>
            </div>
        </div>
    </div>
        <div class="card-footer ">
            <hr>
            <div class="stats">
                <i class="fa fa-refresh"></i>
                Update Now
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="card">
        <div class="card-header">
            <h4>Users</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-striped" id="userstable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Created At</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
    <!-- add user -->
    <div class="card">
        <div class="card-header">
            <h4>Add User</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" class="form-control"/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" class="form-control"/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="emailaddress">Email</label>
                    <input type="text" id="emailaddress" class="form-control"/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="userposition">Position</label>
                    <select name="userposition" id="userposition" class="form-control"></select>
                </div>
            </div>
            <button class="btn btn-outline-primary pull-right" id="adduser"><i class="nc-icon nc-check-2"></i> Add</button> 
        </div>
    </div>
    <!-- update user -->
    <div class="card">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <input type="hidden" id="userid"/>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="editfirstname">Firstname</label>
                    <input type="text" id="editfirstname" class="form-control"/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="editlastname">Lastname</label>
                    <input type="text" id="editlastname" class="form-control"/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="editemailaddress">Email</label>
                    <input type="text" id="editemailaddress" class="form-control"/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label for="edituserposition">Position</label>
                    <select name="edituserposition" id="edituserposition" class="form-control"></select>
                </div>
            </div>
            <button class="btn btn-outline-info pull-right" id="edituser"><i class="nc-icon nc-check-2"></i> Edit</button> 
        </div>
    </div>
</div>
@endif
@endsection


@section('scripts')
<script>
var userstable;
$(document).ready(function(){
    $('#userstable').DataTable();
    getuserpositions();
    fetchusers();
});

function getuserpositions(){
    $.ajax({
        url: "{{ url('/getpositions') }}",
        method: "GET"
    }).done(function(response){
        var optionadduser = "";
        var optionedituser = "";
        if(response.response){
            $.each(response.data, function(i, v){
                var id = response.data[i].id;
                var name = response.data[i].name;
                optionadduser += "<option value='"+id+"'>"+name+"</option>";
            });
            $('#userposition').append(optionadduser);
            $('#userposition').select2();

            // edit user
            $.each(response.data, function(i, v){
                var id = response.data[i].id;
                var name = response.data[i].name;
                optionedituser += "<option value='"+id+"'>"+name+"</option>";
            });
            $('#edituserposition').append(optionedituser);
            $('#edituserposition').select2();
        }
    });
}

$(document).on('click', '#adduser', function(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var emailaddress = $('#emailaddress').val();
    var userposition = $('#userposition').val();

    $.ajax({
        url: "{{ url('/adduser') }}",
        method: "POST",
        data: {
            first_name: firstname,
            last_name: lastname,
            email: emailaddress,
            positions_id: userposition,
            "_token": "{{ csrf_token() }}"
        }
    }).done(function(response){
        if(response.response){
            toastr.success(response.message);
            $('#firstname').val('');
            $('#lastname').val('');
            $('#emailaddress').val('');
            fetchusers();
        }else{
            toastr.error(response.message);
        }
    });

});

function fetchusers(){
    $.ajax({
        url: "{{ url('/fetchusers') }}",
        method: "GET"
    }).done(function(response){
        if(response.response){
            userstable = $('#userstable').DataTable().clear().destroy();
            userstable = $('#userstable').DataTable({
                data: response.data,
                columns: [
                    {"data": "name"},
                    {"data": "position"},
                    {"data": "created_at"},
                    {"data": "email"},
                    {"data": null, title: 'Action', wrap: true, "render":
                    function (item) { 
                        return '<div class="btn-group"> <button type="button" onclick="editthisuser(' + item.id + ')" value="0" class="btn btn-outline-warning"><i class="nc-icon nc-settings-gear-65" aria-hidden="true"></i></button> <button class="btn btn-outline-danger" onclick="deletethisuser('+item.id+')"><i class="nc-icon nc-box" aria-hidden="true"></i></button></div>' 
                    }},
                ]
            });
        }
        
    });
}

function editthisuser(id){
    $.ajax({
        url: "{{ url('/getthisuser/') }}",
        method: "GET",
        data:{
            id: id
        }
    }).done(function(response){
        if(response.response){
            $('#editfirstname').val('');
            $('#editlastname').val('');
            $('#editemailaddress').val('');
            $('#userid').val('');
            $('#editfirstname').val(response.data.first_name);
            $('#editlastname').val(response.data.last_name);
            $('#editemailaddress').val(response.data.email);
            $('#userid').val(response.data.id);
        }
    });
}

$(document).on('click', '#edituser', function(){
    var editfirstname = $('#editfirstname').val();
    var editlastname = $('#editlastname').val();
    var editemailaddress = $('#editemailaddress').val();
    var edituserposition = $('#edituserposition').val();
    var userid = $('#userid').val();
    $.ajax({
        url: "{{ url('/edituser') }}",
        method: "put",
        data: {
            "_token": "{{ csrf_token() }}",
            first_name: editfirstname,
            last_name: editlastname,
            email: editemailaddress,
            positions_id: edituserposition,
            userid: userid
        }
    }).done(function(response){
        if(response.response){
            toastr.success(response.message);
            $('#editfirstname').val('');
            $('#editlastname').val('');
            $('#editemailaddress').val('');
            $('#userid').val('');
            fetchusers();
        }else{
            toastr.error(response.message);
        }
    });
});

function deletethisuser(id){
    $.ajax({
        url: "{{ url('/deletethisuser') }}",
        method: "delete",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id
        }
    }).done(function(response){
        if(response.response){
            toastr.success(response.message);
            fetchusers();
        }
    });
}

</script>
@endsection
