@extends('layouts.index')

@section('main')

<div class="view-cart container">

    <h4> THE COFFEE / ĐẶT HÀNG</h4>
    
    @if(count($cart->items))
    
    <div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Thông tin giỏ hàng</h3>
    </div>

        <div class="panel-body">
            <table class="table table-hover table-cart">
                <thead>
                    <tr>
                        <th class="hidden-mobile">STT</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                   
                    @php $stt = 1; @endphp
                    @foreach($cart->items as $item)
                    @php
                    $tt = $item['quantity']*$item['price'];

                    @endphp
                    <tr>
                        <td class="hidden-mobile">{{ $stt }}</td>
                        <td>
                            <img src="{{ url('/') }}/public/images/{{$item['image']}}" alt="" style="width: 50px;">
                        </td>
                        <td style="text-transform: uppercase;">{{$item['name']}}</td>
                        <td>
                            <form action="{{route('update')}}" class="form-inline">
                                <div class="form-group">
                                 <input type="number" name="quantity" value="{{$item['quantity']}}" class ="input-update" style="padding-left: 10px">

                                 <button type="submit" class="btn btn-success btn-status" style=" margin-left: 10px;" title="Cập nhật">Cập nhật</button>
                                 <input type="hidden" name="id" value="{{$item['id']}}">
                                 <input type="hidden" name="price" value="{{$item['price']}}">
                             </div>
                         </form>

                        </td>
                         <td>{{number_format($item['price'],0,'','.')}} vnđ</td>
                         <td>{{number_format($tt,0,'','.')}} vnđ</td>
                         <td>
                            <a href="{{route('remove',['id'=>$item['id']])}}" class="label label-danger" onclick="return confirm('Bạn muốn xóa sản phẩm này?')" title="Xóa">Xóa</a>
                        </td>
                    </tr>

                @php $stt++ @endphp
                @endforeach
               
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align: center">Tổng tiền</th>
                        <th colspan="4">{{number_format($cart->total(),0,'','.')}} vnđ</th>
                    </tr>
                </tfoot>

            </table>

        </div>
   

<div class="text-center">
    <a href="{{route('home')}}" title="Trang chủ" class="btn btn-primary">
        Tiếp tục mua hàng
    </a>

    <a href="{{route('clear')}}" class="btn btn-danger" title="Xóa giỏ hàng" onclick="return confirm('Bạn muốn xóa toàn bộ giỏ hàng?')">Xóa toàn bộ giỏ hàng
    </a>

    @if(Auth::check() && Auth::user()) 
    <a href="{{route('order')}}" class="btn btn-success" title="Đặt ngay">Đặt ngay</a>
    @else
    <a href="{{route('login')}}" class="btn btn-success" title="Đăng nhập">Vui lòng đăng nhập để mua hàng</a>
   @endif()

</div>
</div>

 @else

    <div class="text-center no-item">
        <img src="{{ url('/') }}/public/images/empty-cart.png" alt="">

        <div>
            Bạn chưa chọn sản phẩn nào?
            <a href="{{route('home')}}" title="Trang chủ" c>
                Hãy chọn ngay 
            </a> 
        </div>  
    </div>    

 @endif()

</div>

@stop()