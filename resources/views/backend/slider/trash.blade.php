@extends('layouts.admin')
@section('title', 'Thùng rác nhà cung cấp')
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
                <strong class="text-danger">Thùng rác slider</strong>
              </div>
              <div class="col-md-6 text-right">
                <a href="{{route('slider.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr class="bg-info">
                  <th class="text-center" style="width:20px;">#</th>
                    <th class="text-center" style="width:100px;">Hình ảnh</th>
                    <th>Tên slider</th>
                    <th>Liên kết</th>
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
                  <td><img src="{{asset('images/slider/' . $row->img)}}" style="width:100px" alt="{{$row->img}}"></td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->url }}</td>
                  <td>{{ $row->created_at }}</td>
                    <td style="width:150px"; class="text-center">
                      <form action="{{ route('slider.destroy',['slider' => $row -> id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('slider.retrash',['id' => $row -> id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i></a>
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