<?php

namespace App\Http\Controllers\Backend;

use App\Models\order;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class reportController extends Controller {
    
    

    public function index() {

        $orderOnline = [];
        $orderStore = [];

        $years = date('Y');

        for($i = 1; $i < 13;$i++) {
            $day_start = $years.'-'.$i.'-1';
            $day_end = $years.'-'.$i.'-31'; 

            // đơn online

            $sum_o = 0;

            $o = order::where('status','confirmed')->where('type',1)->whereBetween('created_at',[$day_start,$day_end])->get();
            
            foreach ($o as $o) {
                $sum_o = $sum_o + $o->sum;
            }

            $orderOnline[$i] = $sum_o;
            
            
            // đơn bán tại cửa hàng

            $sum_i = 0;
            
            $imp = order::where('status','confirmed')->where('type',2)->whereBetween('created_at',[$day_start,$day_end])->get();
                foreach ($imp as $imp) {
                $sum_i = $sum_i + $imp->sum;
                }

            $orderStore[$i]=$sum_i;
            
        }

        return View('report.index',[
           'orderOnline'=> $orderOnline,
           'orderStore'=> $orderStore,       
        ]);    
    }

    public function reportDay() {
        
        $current_day = date("Y-m-d"); 
        $date='';
	                       
		$order = order::join('user','order.id_cus','=','user.id')
                ->join('admins','order.admin_id','=','admins.id')
                ->select('order.*','admins.full_name as admin_name','user.full_name as user_name')
                ->where('order.status','confirmed')
                ->whereDate('order.created_at', $current_day)
                ->paginate(10);

		return View('report.report-day',[
            'order'=>$order,
            'date'=>$date         
        ]); 
  
    }

    public function reportSearch(Request $request) {
        $date = date('Y-m-d ', strtotime($request->day));  
                    
        $order = order::join('user','order.id_cus','=','user.id')
                ->join('admins','order.admin_id','=','admins.id')
                ->select('order.*','admins.full_name as admin_name','user.full_name as user_name')
                ->where('order.status','confirmed')
                ->whereDate('order.created_at', $date)
                ->paginate(10);

        return View('report.report-day',[
            'order'=>$order,  
            'date'=>$date          
        ]); 
  
    }

    public function reportMonthSearch(Request $request) {
        $month = $request->month;     

        $order = order::join('user','order.id_cus','=','user.id')
                ->join('admins','order.admin_id','=','admins.id')
                ->select('order.*','admins.full_name as admin_name','user.full_name as user_name')
                ->where('order.status','confirmed')
                ->whereMonth('order.created_at', $month)
                ->paginate(10);

        return View('report.report-month',[
            'order'=>$order,  
            'month'=>$month          
        ]); 
  
    }

    public function reportMonth() {  
        $month = '';
        $current_month = date("m");   

        $order = order::join('user','order.id_cus','=','user.id')
                ->join('admins','order.admin_id','=','admins.id')
                ->select('order.*','admins.full_name as admin_name','user.full_name as user_name')
                ->where('order.status','confirmed')
                ->whereMonth('order.created_at', $current_month)
                ->paginate(10);

        return view('report.report-month',[
            'order'=>$order,
            'month' => $month
        ]);   
    }

}
