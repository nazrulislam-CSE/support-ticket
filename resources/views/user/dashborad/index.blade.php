@extends('layouts.user.app', ['pageTitle' => $pageTitle])
@section('content')
    <div class="main-content-body">
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="javascript:;" class="text-dark" onclick="comingSoon();">
                    <div class="card overflow-hidden project-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="my-auto">
                                    <img src="{{ asset('dashboard/img/icons/total-sales.png') }}" alt="" class="me-5 ht-70 wd-70 my-auto border shadow-sm rounded-lg p-2 bg-light">
                                </div>
                                <div class="project-content d-grid align-items-center">
                                    <h4>{{ __('Total Ticket') }}</h4>
                                    <ul>
                                        <li>
                                            <strong class="d-inline-flex mb-0" style="font-size: 15px !important;">Total:</strong>
                                            <span><strong style="font-size: 15px !important;">10,000</strong></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="javascript:;" class="text-dark" onclick="comingSoon();">
                    <div class="card  overflow-hidden project-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="my-auto">
                                    <img src="{{ asset('dashboard/img/icons/deposit.png') }}" alt="" class="me-5 ht-70 wd-70 my-auto border shadow-sm rounded-lg p-2 bg-light">
                                </div>
                                <div class="project-content d-grid align-items-center">
                                    <h4>{{ __('Pending Ticket') }}</h4>
                                    <ul>
                                        <li>
                                            <strong class="d-inline-flex mb-0" style="font-size: 15px !important;">Total:</strong>
                                            <span><strong style="font-size: 15px !important;">10,000</strong></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="javascript:;" class="text-dark" onclick="comingSoon();">
                    <div class="card overflow-hidden project-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="my-auto">
                                    <img src="{{ asset('dashboard/img/icons/total-expense.png') }}" alt="" class="me-5 ht-70 wd-70 my-auto border shadow-sm rounded-lg p-2 bg-light">
                                </div>
                                <div class="project-content d-grid align-items-center">
                                    <h4>{{ __('Processing Ticket') }}</h4>
                                    <ul>
                                        <li>
                                            <strong class="d-inline-flex mb-0" style="font-size: 15px !important;">Total:</strong>
                                            <span><strong style="font-size: 15px !important;">10,000,0000</strong></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="javascript:;" class="text-dark" onclick="comingSoon();">
                    <div class="card overflow-hidden project-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="my-auto">
                                    <img src="{{ asset('dashboard/img/icons/due.png') }}" alt="" class="me-5 ht-70 wd-70 my-auto border shadow-sm rounded-lg p-2 bg-light">
                                </div>
                                <div class="project-content d-grid align-items-center">
                                    <h4>{{ __('Delivery Ticket') }}</h4>
                                    <ul>
                                        <li>
                                            <strong class="d-inline-flex mb-0" style="font-size: 15px !important;">Total:</strong>
                                            <span><strong style="font-size: 15px !important;">10,000,0000</strong></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
