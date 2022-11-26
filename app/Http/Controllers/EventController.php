<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use yajra\Datatables\Datatables;
use DB;

class EventController extends Controller
{
    public function index(Request $request)
    {     
        $get_event_list = Event::orderBy('id','desc')->get();
        return view('event_list',compact('get_event_list'));  
    }   

    public function call_data(Request $request)
    {
        DB::enableQueryLog();
        $get_dataQue = Event::orderBy('id','desc')->orderBy('id','asc');
        
        if(!empty($request->type)){ 
            // $data = $data->where('user_type',$request->type);
            if($request->type=="today"){ 
                $from_date = date('Y-m-d');
                $to_date = date('Y-m-d'); 
            }else if($request->type=="week"){
                $from_date = date('Y-m-d', strtotime('+7 days'));
                $to_date = date('Y-m-d'); 
            }else if($request->type=="month"){
                $from_date = date('Y-m-d', strtotime('+1 Months'));
                $to_date = date('Y-m-d'); 
            }else if($request->type=="year"){
                $from_date = date('Y-m-d', strtotime('+1 year'));
                $to_date = date('Y-m-d'); 
            } 
        }else{
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');  
        } 

        $get_data = $get_dataQue->where(function ($q) use ($from_date, $to_date) {
            $q->where('start_date', '>=', $to_date);
            $q->where('end_date', '<=', $from_date);
        })->get();
 
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->editColumn("event_name",function($get_data){
                return (@$get_data->event_name) ? @$get_data->event_name : "";
            })
            ->editColumn("start_date",function($get_data){
                return date("Y-m-d", strtotime(@$get_data->start_date));
            })
            ->editColumn("end_date",function($get_data){
                return date("Y-m-d", strtotime(@$get_data->end_date));
            })
            ->editColumn("created_at",function($get_data){
                return date("Y-m-d", strtotime(@$get_data->created_at));
            })
            ->editColumn("action",function($get_data){

                $cr_form = '<form id="form_del_'.$get_data->id.'" action="'.route('event_delete',$get_data->id).'" method="POST">
                            <input type="hidden" name="_token" value="'.csrf_token().'" />';
 
                $cr_form .= '<a class="btn btn-info btn-rounded btn-condensed btn-sm s_btn1 " href="'.route('event_detail',$get_data->id).'" ><i class="fa fa-eye"></i></a>';

                $cr_form .= '<a class="btn btn-default btn-rounded btn-condensed btn-sm s_btn1" href="'.route('event_edit',$get_data->id).'"><i class="fa fa-pencil"></i></a> '; 

                $cr_form .= '<input type="hidden" name="_method" value="GET">';

                $cr_form .= '<button type="button" data-id="'.$get_data->id.'" class="btn btn-danger btn-rounded btn-condensed btn-sm del-confirm s_btn1" ><i class="fa fa-trash"></i></button>'; 
 
                $cr_form .='</form>';

                return $cr_form;
            }) 
            ->rawColumns(['start_date','end_date','created_at','action'])->make(true);

    }

    public function event_create(Request $request)
    {    
        return view('event_create'); 
    }

    public function event_edit($event_id="")
    {    
        if($event_id!=""){
            $get_event_detail = Event::where('id',$event_id)->first();
            return view('event_edit',compact('get_event_detail','event_id')); 
        }
    }

    public function event_detail($event_id="")
    {    
        if($event_id!=""){
            $get_event_detail = Event::where('id',$event_id)->first(); 

            $this_start_date = $get_event_detail->start_date;
            $get_next_event_date = Event::whereDate('start_date', '>', $this_start_date)->limit(5)->groupBy('start_date')->get();
            
            return view('event_detail',compact('get_event_detail','get_next_event_date')); 
        }  
    } 

    public function update(Request $request, $event_id)
    { 
        request()->validate([
            'event_name' => 'required|max:30',
            'start_date' => 'required',   
            'recurrence_type' => 'required' 
        ]); 

        $input = $request->all(); 
        $res_data = Event::find($event_id)->update($input);
        
        return redirect()->route('event_list')->with('success','Event updated successfully');
    }

    public function event_save(Request $request)
    { 
        request()->validate([
            'event_name' => 'required|max:30',
            'start_date' => 'required',   
            'recurrence_type' => 'required' 
        ]); 

        $input = $request->all();  
        
        $res_data = Event::create($input);
        
        return redirect()->route('event_list')->with('success','Event created successfully');
    }

    public function event_delete($id)
    {  
        $insert = Event::where('id',$id)->delete(); 
        return redirect()->route('event_list')->with('success','Event deleted successfully');
    }

}
