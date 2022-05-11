@extends('layouts.admin');
@section('title', 'Quản lý khách hàng')
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
                <strong class="text-danger">Quản lý thành viên</strong>
              </div>
              <div class="col-md-6 text-right">
                  <a href="{{route('user-trash')}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px;">#</th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
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
                    <td>{{ $row->fullname }}</td>
                    <td>{{ $row->gender==1?'Nữ':'Nam' }}</td>
                    <td>{{ $row->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.show', ['user' => $row -> id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                      
                        @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin' || Auth::user()->roles == 'author')
                         @if($row->status == 1)
                            <a href="{{ route('user.status',['id' => $row -> id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-toggle-on"></i></a>
                          @else
                            <a href="{{ route('user.status',['id' => $row -> id]) }}" class="btn btn-sm" style="background: #cccccc"><i class="fas fa-toggle-off"></i></a>
                          @endif
                      @endif
                      
                      @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <a href="{{ route('user.deltrash',['id' => $row -> id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      @endif
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