@extends('layouts.admin');
@section('title', 'Danh Mục Sản Phẩm')
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
                <strong class="text-danger">Danh mục sản phẩm</strong>
              </div>
              <div class="col-md-6 text-right">
                  <a href="{{route('category.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm</a>
                  <a href="{{route('category-trash')}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px;">#</th>
                    <th>Tên danh sách SP</th>
                    <th>Slug</th>
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
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->slug }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td class="text-center">
                  <a href="{{ route('category.show',['category' => $row -> id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('category.edit',['category' => $row -> id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                      @if($row->status == 1)
                  <a href="{{ route('category.status',['id' => $row -> id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-toggle-on"></i></a>
                      @else
                  <a href="{{ route('category.status',['id' => $row -> id]) }}" class="btn btn-sm" style="background: #cccccc"><i class="fas fa-toggle-off"></i></a>
                      @endif

                  <a href="{{ route('category.deltrash',['id' => $row -> id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    
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