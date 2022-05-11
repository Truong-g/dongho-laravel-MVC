@extends('layouts.admin');
@section('title', 'Thùng rác đơn hàng')
@section('maincontent')
@section('header')
  <link rel="stylesheet" href="{{ asset('template/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
  <script src="{{ asset('template/jquery.dataTables.min.js')}}"></script>
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
  } 
);
  </script>
@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-6">
                <strong class="text-danger">Thùng rác đơn hàng</strong>
              </div>
              <div class="col-md-6 text-right">
                <a href="{{route('order.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          
          <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr class="bg-info">
                  <th class="text-center" style="width:20px;">#</th>
                  <th style="width: 100px">Họ tên</th>
                  <th style="width: 100px">Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th style="width: 100px">Ngày tạo</th>
                  <th style="width: 100px">Tổng tiền</th>
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
                    <td class="text-center">
                      <form action="{{ route('order.destroy',['order' => $row -> id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
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