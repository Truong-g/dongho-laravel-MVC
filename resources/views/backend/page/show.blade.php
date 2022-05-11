@extends('layouts.admin');
@section('title', 'Chi tiết trang đơn')
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
                      CHI TIẾT TRANG ĐƠN
                  </strong>
              </div>
              <div class="col md-6 text-right">
                  <a href="{{route('page.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        <div class="card-body">
         <table class="table table-bordered">
             <tr>
                 <th>Tên trường</th>
                 <th>Giá trị</th>
             </tr>
             <tr>
                 <td>ID</td>
                 <td>{{$page->id}}</td>
             </tr>
             <tr>
                <td>Hình ảnh</td>
                <td><img src="{{asset('images/posts/'.$page->img)}}" style="width:90px; height: 49px;" alt="{{$page->name}}"></td>
            </tr>
            <tr>
                <td>Tên trang đơn</td>
                <td>{{$page->title}}</td>
            </tr>
            <tr>
                <td>Slug</td>
                <td>{{$page->slug}}</td>
           </tr>
            <tr>
                <td>Nội dung</td>
                <td>{{$page->content}}</td>
            </tr>
            <tr>
              <td>Ngày tạo</td>
              <td>{{$page->created_at->format('H:i d/m/Y')}}</td>
            </tr>
            <tr>
              <td>Người tạo</td>
              @foreach ($users as $user)
                @if ($page->created_by == $user->id)
                    <td>{{$user->fullname}}</td>
                @endif
              @endforeach
            </tr>
            <tr>
              <td>Trạng thái</td>
              @if ($page->status == 1)
                <td>Xuất bản</td>
              @else
                <td>Chưa xuất bản</td>
              @endif
            </tr>
            
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