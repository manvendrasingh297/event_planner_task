@extends('layouts.app')
@section('content') 
    
    <section id="contact" class="mt-10">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="contact_contant sections"> 
                                    <div class="col-sm-12">
                                        <div class="head_title">
                                            <h3>EDIT EVENT</h3>
                                            <div class="separator"></div>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="single_contant_left">
                                            <!-- <form id="validate" action="{{ route('event_save') }}"  method="POST" role="form" enctype="multipart/form-data" > 
                                            @csrf
                                               <input type="hidden" name="event_id" value="{{ $event_id }}"> -->

                                            <form id="validate" action="{{ route('event_update',$event_id) }}" method="POST" role="form" enctype="multipart/form-data" >
  
                                                @csrf 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="event_name" placeholder="Event Name" required="" value="{{ old('event_name') ? old('event_name') : $get_event_detail->event_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select class="form-control" name="recurrence_type">
                                                                <option value="">Select Recurrence Type </option>
                                                                <option {{ ($get_event_detail->recurrence_type=='single') ? 'selected' : ''}} value="single">Single</option>
                                                                <option {{ ($get_event_detail->recurrence_type=='daily') ? 'selected' : ''}} value="daily">Daily</option>
                                                                <option {{ ($get_event_detail->recurrence_type=='weekly') ? 'selected' : ''}} value="weekly">Weekly</option>
                                                                <option {{ ($get_event_detail->recurrence_type=='monthly') ? 'selected' : ''}} value="monthly">Monthly</option>  
                                                                <option {{ ($get_event_detail->recurrence_type=='yearly') ? 'selected' : ''}} value="yearly">Yearly</option>  
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="start_date" placeholder="Start Date" required="" value="{{ old('start_date') ? old('start_date') : $get_event_detail->start_date }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="end_date" placeholder="End Date" required="" value="{{ old('end_date') ? old('end_date') : $get_event_detail->end_date }}" >
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <textarea class="form-control" name="description" rows="8" placeholder="Description">{{ old('description') ? old('description') : $get_event_detail->description }}</textarea>
                                                </div> 
                                                <div class="">
                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                </div> 
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div></section>

@endsection