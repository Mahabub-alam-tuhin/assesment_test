@extends('admin.user-master')
@section('title')
    Home
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
        <div class="row custom-style">

            <div class="col-lg-3">
                <div class="card" style="text-align: center">
                    <div class="card-header">
                       Total product 
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $totaltitle }}</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="card" style="text-align: center">
                    <div class="card-header">
                       Total Product Price
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $totalSum }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
