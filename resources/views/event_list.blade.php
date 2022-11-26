@extends('layouts.app')
@section('content') 
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap.min.css" > 
  
    <section id="contact" class="mt-10">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row"> 
                        <div class="contact_contant sections">
                            <div class="col-sm-12" > 
                                <div class="col-sm-6">
                                    <div>
                                        <h3>EVENT LIST</h3>
                                        <div class="separator"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">  
                                     <a href="{{ route('event_create') }}" class="btn btn-primary" style="float: right; margin-top: 0px !important; line-height: 15px; height: 36px; font-size: 15px;" >Create</a>
                                     <select class="form-control form-control-sm type" id="type" name="type" style="float: right; width: 163px; margin-right: 12px;">
                                        <option value="today">Today</option>
                                        <option value="week">Week</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">  
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
                                 <div class="table-responsive">
                                    <table id="my_data_table" class="table table-striped table-bordered" style="width:100%" > 
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th>Event Name</th>
                                                <th width="100">Start Date</th> 
                                                <th width="90">End Date</th>
                                                <th width="90">Create Date</th>
                                                <th width="180">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>     
                                        </tbody>
                                    </table>
                                </div>
                            </div>   

                        </div>
                    </div>
                </div>
            </div>
    </section>   


@section('script')  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap.min.js" ></script>
    <script>  
        var URL = '{{url('/')}}'; 

        $(document).on("click", '.del-confirm', function(e){  // worked with dynamic loaded jquery content
        
            data_id = $(this).data('id');  
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Are you sure, you want to remove this event?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {  
                if(willDelete){     
                    $('#form_del_'+data_id).submit();
                } else {
                    swal("Your record file is safe!");
                }
            });

        });

        $(document).ready(function() {  
  
            var userDataTable = $('#my_data_table').DataTable({
                processing:true,
                serverSide:true,
                "order": [[3,'desc']],
                "pageLength": 5, 
                ajax: {
                    url: URL+"/event_call_data",
                    data: function (d) {
                        d.type = $('.type').val()               
                    },
                },
                columns:[
                    {data:"DT_RowIndex",name:"DT_RowIndex",orderable:false},
                    {data:"event_name",name:"event_name"},
                    {data:"start_date",name:"start_date"},
                    {data:"end_date",name:"end_date"},
                    {data:"created_at",name:"created_at"},
                    {data:"action",name:"DT_RowIndex",orderable:false},
                ]
            }); 

            $("#type").change(function(e){
                alert("The text has been changed.");
                
                    e.preventDefault();
                    userDataTable.draw();
                    
              }); 
        });
     </script> 
 @endsection
 @endsection