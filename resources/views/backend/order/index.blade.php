@extends('layouts.admin');
@section('title', 'Đơn hàng')
@section('maincontent')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-6">
                <strong class="text-danger">Quản lý đơn hàng</strong>
              </div>
              <div class="col-md-6 text-right">
                  <a href="{{route("order-trash")}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered">
              <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px;">#</th>
                    <th style="width: 100px">Họ tên</th>
                    <th style="width: 100px">Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th style="width: 100px">Ngày tạo</th>
                    <th style="width: 100px">Tổng tiền</th>
                    <th style="width: 100px">Tình trạng</th>
                    <th style="width: 100px">Chức năng</th>
                    <th class="text-center" style="width:20px;">ID</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($list as $row)
                <tr>
                    <td class="text-center" style="width:20px;">
                        <input type="checkbox" name="checkboxid" id="value">
                    </td>
                    <td style="width: 100px">{{ $row->fullname }}</td>
                    <td style="width: 100px">{{ $row->phone }}</td>
                    <td>{{ $row->address }}</td>
                    <td style="width: 100px">{{ $row->created_at }}</td>
                    <td style="width: 100px">{{number_format($row->total)}}đ</td>
                    <td style="width: 150px">
                    @php
                        if($row->status == 1){
                           echo "Đã thanh thoán";
                        }else {
                            if($row->status == 2) echo "Đang vận chuyển";
                            else if($row->status == 3)echo "Đang chờ duyệt";
                        }
                    @endphp
                    </td>
                    <td style="width: 100px">
                      <a href="{{ route('order.show',['order' => $row -> id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                        @if ($row->status != 3)
                            @if($row->status == 1)
                                <a href="{{ route('order.status',['id' => $row -> id]) }}" class="btn btn-sm" style="background: #cccccc"><i class="fas fa-toggle-off"></i></a>
                            @else
                               <a href="{{ route('order.status',['id' => $row -> id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-toggle-on"></i></a>
                            @endif
                        @endif
                         
    
                      <a href="{{ route('order.deltrash',['id' => $row -> id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                    <td class="text-center" style="width:20px;">{{ $row->id }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection