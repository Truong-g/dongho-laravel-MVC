@extends('layouts.admin');
@section('title', 'Chi tiết bình luận bài viết')
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
                      CHI TIẾT BÌNH LUẬN BÀI VIẾT
                  </strong>
              </div>
              <div class="col md-6 text-right">
                  <a href="{{route('comment.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
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
                 <td>{{$comment->id}}</td>
             </tr>
             <tr>
                <td>Tên bình luận</td>
                <td>{{$comment->name}}</td>
            </tr>
            <tr>
              <td>Tên bài viết</td>
              <td>{{$comment->title}}</td>
          </tr>
          <tr>
            <td>Tên Nội dung bình luận</td>
            <td>{{$comment->commcontent}}</td>
        </tr>
        
          <tr>
          <td>Ngày tạo</td>
          <td>{{$comment->created_at->format('H:i  d/m/Y')}}</td>
        </tr>
        <tr>
          <td>Người tạo</td>
          @foreach ($users as $user)
            @if ($comment->created_by == $user->id)
                <td>{{$user->fullname}}</td>
            @endif
          @endforeach
        </tr>
        <tr>
          <td>Trạng thái</td>
          @if ($comment->status == 1)
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