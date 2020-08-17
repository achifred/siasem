@extends('layout.dashboardlayout')

@section('dashboardContent')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div
                            class="icon-medium text-center icon-danger"
                        >
                            <i
                                class="fa fa-music text-danger"
                            ></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">
                                {{$total_plays}}
                            </p>
                            <p class="card-title"></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <hr />
                <div class="stats">
                    
                    Total Audio Plays 
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div
                            class="icon-medium text-center icon-warning"
                        >
                            <i
                                class="fa fa-podcast text-success"
                            ></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">
                                
                                {{$published_podcast}}
                            </p>
                            <p class="card-title">
                            
                            </p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <hr />
                <div class="stats">
                    
                    Total Published Podcasts 
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div
                            class="icon-medium text-center icon-warning"
                        >
                            <i
                                class="fa fa-microphone-slash text-danger"
                            > </i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">
                                {{$unpublished_podcast}}
                            </p>
                            <p class="card-title"></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <hr />
                <div class="stats">
                    
                    Total Unpublished Podcasts
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div
                            class="icon-medium text-center icon-warning"
                        >
                            <i
                                class="fa fa-users text-primary"
                            ></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">
                                Customers
                            </p>
                            <p class="card-title"></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <hr />
                <div class="stats">
                    
                    Total Customers
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection