@extends('layouts.admin');
@section('title', 'Chi tiết đơn hàng')
@section('maincontent')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col md-6">
                  <strong class="text-danger">
                      CHI TIẾT ĐƠN HÀNG
                  </strong>
              </div>
              <div class="col md-6 text-right">
                  <a href="{{route('order.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        <div class="card-body">
         <table class="table table-bordered">
             <tr>
               <th>Mã đơn hàng</th>
               <th>Tên khách hàng</th>
               <th>Số điện thoại</th>
               <th>Email</th>
               <th>Địa chỉ</th>
               <th>Ngày đặt</th>
               <th>Tổng tiền</th>
               <th>Tình trạng</th>
             </tr>
             <tr>
               <td>{{$order->id}}</td>
               <td>{{$order->fullname}}</td>
               <td>{{$order->phone}}</td>
               <td>{{$order->email}}</td>
               <td>{{$order->address}}</td>
               <td>{{$order->created_at}}</td>
               <td>{{$order->total}}</td>
               <td>
                @php
                    if($order->status == 1){
                      echo "Đã thanh thoán";
                    }else {
                      if($order->status == 2) echo "Đang vận chuyển";
                      else if($order->status == 3)echo "Đang chờ duyệt";
                    }
                @endphp

               </td>
             </tr>
         </table>

         <p class="fs-4 fw-bolder mt-1">Ghi chú: <strong>{{$order->note}}</strong></p>

         <h4 class="display-6 my-3">Sản phẩm</h4>

         <table class="table table-bordered">
          <tr>
            <th>Mã sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th>Tổng tiền</th>
          </tr>
          @foreach ($orderdetail as $item)
          <tr>
            <td>{{$item->productid}}</td>
            <td style="width: 80px"><img style="width: 100%" src="{{asset("images/products/".$item->img)}}" alt="{$item->name}}"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->number}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->amount}}</td>
          </tr>
          @endforeach
          

      </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection