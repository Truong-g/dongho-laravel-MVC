@extends('layouts.admin');
@section('title', 'Chi tiết bài viết')
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
                      CHI TIẾT BÀI VIẾT
                  </strong>
              </div>
              <div class="col md-6 text-right">
                  <a href="{{route('post.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
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
                 <td>{{$post->id}}</td>
             </tr>
             <tr>
                <td>Hình ảnh</td>
                <td><img src="{{asset('images/posts/'.$post->img)}}" style="width:90px; height: 49px;" alt="{{$post->name}}"></td>
            </tr>
            <tr>
                <td>Tên bài viết</td>
                <td>{{$post->title}}</td>
            </tr>
            <tr>
                <td>Tên chủ đề</td>
                @foreach ($topics as $top)
                    @if ($post->topid == $top->id)
                        <td>{{$top->name}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>Slug</td>
                <td>{{$post->slug}}</td>
           </tr>
            <tr>
                <td>Nội dung</td>
                <td>{{$post->content}}</td>
            </tr>
            <tr>
              <td>Ngày tạo</td>
              <td>{{$post->created_at->format('H:i d/m/Y')}}</td>
            </tr>
            <tr>
              <td>Người tạo</td>
              @foreach ($users as $user)
                @if ($post->created_by == $user->id)
                    <td>{{$user->fullname}}</td>
                @endif
              @endforeach
            </tr>
            <tr>
              <td>Trạng thái</td>
              @if ($post->status == 1)
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