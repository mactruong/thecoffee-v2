<?php 
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\user;
use App\Models\category;
use App\Models\products;
use App\Models\admins;
use App\Models\news;
use Auth;
/**
* 
*/
class homeController extends Controller
{
    public function index()
    {
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

        $order_count = order::where('status','confirmed')->count('*');
		$customer_count = user::where('type',1)->count('*');            
		$products_count = products::count('*');                  
		$order_comfirm = order::where('status','pending')->count('*');       
		$category_count = category::count('*');            
		$news_count = news::count('*');

		$admin = Admins::join('role','admins.id_role','=','role.id')
            ->select('admins.*','role.role_key as role_key')
            ->where('admins.id',Auth::guard('admin')->user()->id)
            ->first();

		return view('home.index',[
            'orderOnline'=> $orderOnline,
            'orderStore'=> $orderStore,
            'order_count'=> $order_count,
            'customer_count'=> $customer_count,
            'products_count'=> $products_count,
            'order_comfirm'=> $order_comfirm,
            'category_count'=> $category_count,
            'news_count'=> $news_count,
            'admin'=>$admin

        ]);   	
    }   
}

?>