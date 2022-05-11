@extends('layouts.admin');
@section('title', 'Chi tiết chủ đề')
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
                      CHI TIẾT CHỦ ĐỀ
                  </strong>
              </div>
              <div class="col md-6 text-right">
                  <a href="{{route('topic.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
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
                 <td>{{$topic->id}}</td>
             </tr>
             <tr>
                <td>Tên chủ đề</td>
                <td>{{$topic->name}}</td>
            </tr>
            <tr>
                <td>Slug</td>
                <td>{{$topic->slug}}</td>
            </tr>
            <tr>
              <td>Chủ đề cha</td>
              @if ($topic->parentid == 0)
                  <td>Cha</td>
              @else
                  @foreach ($topics as $top)
                        @if ($topic->parentid == $top->id)
                            <td>{{$top->name}}</td>
                        @endif
                  @endforeach
              @endif
            </tr>
            <tr>
            <td>Từ khóa SEO</td>
            <td>{{$topic->metakey}}</td>
          </tr>
          <tr>
          <td>Mô tả SEO</td>
          <td>{{$topic->metadesc}}</td>
          </tr>
          <tr>
          <td>Ngày tạo</td>
          <td>{{$topic->created_at->format('H:i  d/m/Y')}}</td>
        </tr>
        <tr>
          <td>Người tạo</td>
          @foreach ($users as $user)
            @if ($topic->created_by == $user->id)
                <td>{{$user->fullname}}</td>
            @endif
          @endforeach
        </tr>
        <tr>
          <td>Trạng thái</td>
          @if ($topic->status == 1)
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