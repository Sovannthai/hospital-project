@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Dashboard')
@section('content')
<style>
    .home-dash{
        transition: 0.5s;
    }   
    .home-dash:hover{
        transform: scale(1.1);
    }
</style>
<div class="row pb-10 mt-4">
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        Patient
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $pataint }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b">
                        <span class="icon-copy ti-heart"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        User
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $users }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
                        <i class="icon-copy dw dw-user2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        Doctor
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $doctors }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon">
                        <i
                            class="icon-copy fa fa-stethoscope"
                            aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        Nurse
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $nurses }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon">
                        <i
                            class="icon-copy fa fa-stethoscope"
                            aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        Employee
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $emp }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
                        <i class="icon-copy dw dw-user2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        Appointment
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $appointment }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
                        <i class="icon-copy dw dw-calendar1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">
                        Product
                    </div>
                    <div class="weight-700 font-24 text-dark">{{ $product }}</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
                        <i class="icon-copy bi bi-boxes"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20 home-dash">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="font-18 text-secondary weight-500">Earning</div>
                    <div class="weight-700 font-24 text-dark">$ 50,000</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06">
                        <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
