@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales overview chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h3 class="card-title m-b-5"><span class="lstick"></span>Sales Overview </h3>
                                <h6 class="card-subtitle">Year 2017</h6></div>
                            <div class="ml-auto">
                                <ul class="list-inline">
                                    <li>
                                        <div class="d-flex">
                                            <i class="fa fa-circle font-10 m-r-10 text-primary m-t-10"></i>
                                            <div>
                                                <h2 class="m-b-0">10368</h2>
                                                <h6 class="text-muted">Earning</h6></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <i class="fa fa-circle font-10 m-r-10 text-info m-t-10"></i>
                                            <div>
                                                <h2 class="m-b-0">12659</h2>
                                                <h6 class="text-muted">Expense</h6></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <i class="fa fa-circle font-10 m-r-10 text-muted m-t-10"></i>
                                            <div>
                                                <h2 class="m-b-0">15478</h2>
                                                <h6 class="text-muted">Sales</h6></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="sales-overview" class="p-relative" style="height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Stats box -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/income.png" alt="Income" /></div>
                            <div class="align-self-center">
                                <h6 class="text-muted m-t-10 m-b-0">Total Income</h6>
                                <h2 class="m-t-0">953,000</h2></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/expense.png" alt="Income" /></div>
                            <div class="align-self-center">
                                <h6 class="text-muted m-t-10 m-b-0">Total Expense</h6>
                                <h2 class="m-t-0">236,000</h2></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/assets.png" alt="Income" /></div>
                            <div class="align-self-center">
                                <h6 class="text-muted m-t-10 m-b-0">Total Assets</h6>
                                <h2 class="m-t-0">987,563</h2></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection