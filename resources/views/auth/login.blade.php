@extends('layouts.app')
@section('content') 
    <section id="contact" class="contact mt-10">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="contact_contant sections">
                            <div class="col-sm-6"> 
                                <div class="main_contact_info"> 
                                    <div class="row">
                                        <div class="contact_info_content">
                                            <div class="col-sm-12">
                                                <img src="{{ asset('public/assets/images/stab1.png') }}" />
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-6"> 
                                <div>
                                    <h3>LOGIN FORM</h3>
                                    <div class="separator"></div>
                                </div>
                                @if($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{{ $message }}</strong>
                                    </div>
                                @endif
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
                                    <form id="validate" action="{{ route('login_submit') }}"  class="form-horizontal" method="POST" role="form" enctype="multipart/form-data" > 
                                    @csrf  
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" placeholder="Email" required="">
                                                </div>
                                            </div> 
                                        </div>  
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                                </div>
                                            </div> 
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
    </section>   
@endsection