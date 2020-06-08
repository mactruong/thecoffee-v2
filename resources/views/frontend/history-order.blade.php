@extends('layouts.index')

@section('main')

<div class="view-order-page container">

    <div class="history-order">
          <h4><a href="{{ route('home') }}">TRANG CHỦ</a> / ĐƠN HÀNG ĐÃ ĐẶT</h4>
    
    @if(count($order))
    <div class="panel panel-success">

        <div class="panel-heading">
            <h3 class="panel-title">
                <b>Thông tin đơn hàng đã đặt của bạn</b>
            </h3>
        </div>

        <div class="panel-body">

            <table class="table table-hover table-order">
                <thead>
                    <tr>
                        <th class="hidden-mobile text-center">Ngày mua</th>
                        <th class="text-center">Chi tiết đơn hàng</th>
                        <th class="text-center">Tổng tiền</th>
                        <th class="hidden-mobile text-center">Người mua</th>
                        <th class="text-center">Trạng thái đơn hàng</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($order as $i)
                    
                    <?php 
                    $i_detail = DB::table('order_detail')->where('order_id',$i->id)->get();
                    $user = DB::table('user')->where('id',$i->id_cus)->first();
                    
                    ?>
                    <tr>

                       <td class="hidden-mobile">{{ date('H:i:s, d-m-Y ', strtotime($i->created_at . ' + 7 hours')) }}</td>

                       <td>
                        @foreach($i_detail as $id)
                        <?php 
                        $pro = DB::table('products')->where('id',$id->pro_id)->first();
                        ?>
                        {{$pro->name}} - Số lượng: {{$id->quantity}}<br>
                        @endforeach
                    </td>

                    <td align="center">{{number_format($i->sum,0,'','.')}}đ</td>

                    <td class="hidden-mobile" align="center">{{ $user->full_name }}</td>

                    <td align="center"> 
                        @if( $i->status == 'pending' )
                            <button type="" class="btn-orange btn-status">
                             Đang chờ xử lý</button>
                        @else
                            <button type="" class="btn-teal btn-status">
                            Đã xác nhận </button>
                        @endif
                     </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        

        <div class="text-center">
            {{ $order->links() }}        
        </div>
    </div>   
    </div>
    @else
    
    <div class="view-cart">
        <div class="view-cart text-center no-item">
            <img src="{{ url('/') }}/public/images/empty-cart.png" alt="">

            <div>
                Bạn chưa có đơn hàng đã đặt nào?
                <a href="{{route('home')}}" title="Trang chủ">
                    Hãy đặt ngay 
                </a> 
            </div>  
        </div>    
    </div>
   
    @endif()  

</div>
  
</div>

@stop()