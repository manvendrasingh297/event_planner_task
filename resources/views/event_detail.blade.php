@extends('layouts.app')
@section('content')
    <section id="features" class="mt-10 features">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="main_features_area sections">
                        <div class="head_title">
                            <h3>EVENT DETAIL</h3>
                            <div class="separator"></div>
                        </div>
                        <div class="row">
                            <div class="main_features_content"> 
                                <div class="col-sm-12">
                                    <div class="single_features_text">
                                        <h4><b>{{ strtoupper($get_event_detail->event_name) }}</b></h4>
                                        <p><b>Description :</b>{{ $get_event_detail->description }} </p> 
                                        <ul>
                                            <li><span><b>Type : </b></span> {{ ucfirst($get_event_detail->recurrence_type) }}}</li>
                                            <li><span><b>Start Date : </b></span> {{ $get_event_detail->start_date }}</li>
                                            <li><span><b>End Date : </b></span> {{ $get_event_detail->end_date }}</li>
                                        </ul> 
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="main_features_area sections">
                        <div class="head_title">
                            <h3>NEXT EVENT DATE's</h3>
                            <div class="separator"></div>
                        </div>
                        <div class="row">
                            <div class="main_features_content">  
                                <div class="col-sm-12">
                                    <div class="single_features_text"> 
                                        <ul>
                                            @foreach($get_next_event_date as $ev_date)
                                                <li style="color: #ff7200; font-size: 15px;" ><i class="fa fa-check-square"></i> <b>{{$ev_date->start_date}}</b></li>
                                            @endforeach
                                        </ul> 
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection