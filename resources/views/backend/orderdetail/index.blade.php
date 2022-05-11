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
              <div class="col-md-6">
                <strong class="text-danger">Quản lý chi tiết đơn hàng</strong>
              </div>
              <div class="col-md-6 text-right">
                  <a href="#" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm</a>
                  <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered">
              <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px;">#</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Thành tiền</th>
                    <th>Ngày tạo</th>
                    <th>Chức năng</th>
                    <th class="text-center" style="width:20px;">ID</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($list as $row)
                <tr>
                    <td class="text-center" style="width:20px;">
                        <input type="checkbox" name="checkboxid" id="value">
                    </td>
                    <td>{{ $row->orderid }}</td>
                    <td>{{ $row->productid }}</td>
                    <td>{{ $row->amount }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                  <a href="#" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
                  <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-toggle-on"></i></a>
                  <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    
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