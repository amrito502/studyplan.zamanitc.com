@extends('master')
@section('content')
<div class="mb-4 row">
    <div class="col-md-12">
        <h3 class="mt-3"><span>Hello</span> <b>{{ Auth::user()->name }}!</b></h3>
        <h5 class="mt-2 mb-2">Welcome to <b>Dashboard</b>!</h5>
        <hr>
    </div>
</div>
    <div class="row">
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Total Users in this Application <h1><b>30K</b></h1></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">My Ongoing Task <h1><b>30</b></h1></h5>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">My Completed Task <h1><b>100</b></h1></h5>
                </div>
            </div>
        </div>

    </div>


@endsection



{{--    --}}
