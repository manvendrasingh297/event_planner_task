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
                                    <h3>REGISTRATION FORM</h3>
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
                                    <form id="reg_form" action="{{ route('register_submit') }}"  class="form-horizontal" method="POST" role="form" enctype="multipart/form-data" > 
                                    @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" placeholder="User Name" required="" value="{{ old('name') }}">
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" placeholder="Email" required="" value="{{ old('email') }}">
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="phone_no" placeholder="Phone No." required="" value="{{ old('phone_no') }}" >
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required="" >
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="">
                                                </div>
                                            </div> 
                                        </div>   

                                        <div class="">
                                            <input type="submit" value="Submit" id="reg_submit" class="btn btn-primary">
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

@section('script')   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
        var URL = '{{url('/')}}';  
        $(document).ready(function() {  
            $('#reg_form').on('submit', function() {
                 confirm_password = $('#confirm_password').val(); 
                 alert(confirm_password); 
                if(!confirm_password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/)) {
                    swal("Password should be at least one uppercase letter, one lowercase letter, one number,one special character,minimum 8 char and maximun 16 characters!");
                    return false;
                } 
            }); 
        });
     </script> 
 @endsection