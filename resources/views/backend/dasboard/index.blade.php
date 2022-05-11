@extends('layouts.admin');
@section('title', 'Bảng Điều Khiển')
@section('maincontent')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Đơn hàng mới <strong class="text-danger">({{count($list)}})</strong></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          @if (count($list) > 0)
          @includeIf('backend.message')
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="width: 50px">Mã ĐH</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item)
                  <tr>
                    <td style="width: 50px">{{$item->id}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{number_format($item->total)}}đ</td>
                    <td><a href="{{ route('order.browse', ['id' => $item -> id]) }}" class="btn btn-sm btn-success">DUYỆT</i></a></td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p class="fw-6 fs-6">Không có đơn hàng mới nào!</p>
          @endif
          
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