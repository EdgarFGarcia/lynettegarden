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
                            <th>Is Done</th>
                            <th></th>
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
});
function loadcancelrequesttable(){
    $.ajax({
        url: "{{ url('/fetchcancelrequest') }}",
        method: "GET"
    }).done(function(response){

    });
}
</script>
@endsection
