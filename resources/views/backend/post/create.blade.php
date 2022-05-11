@extends('layouts.admin');
@section('title', 'Thêm bài viết')

@section('footer')
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
         CKEDITOR.replace('content')
    </script>
@endsection


@section('maincontent')


<form name="form1" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-7">
                <strong class="text-danger">Thêm bài viết</strong>
              </div>
              <div class="col-md-5 text-right">
                  <button class="btn btn-sm btn-success" type = "submit"><i class="fas fa-save"></i> Lưu</button>
                  <a href="{{route('post.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        @includeIf('backend.message')
        <div class="card-body">
            <section class = "content">
              <div class="row">
                <div class="col-md-9">
                    <div class="my-2">
                      <label for="title">Tiêu đề bài viết</label>
                      <input type="text" value="{{old('title')}}" id = "title" name = "title" class="form-control" placeholder="Nhập tiêu đề bài viết">
                    @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="content">Chi tiết bài viết</label>
                      <textarea name="content" value="{{old('content')}}" id="content" class="form-control" placeholder="Nhập chi tiết bài viết"></textarea>
                      @if($errors->has('content'))
                      <span class="text-danger">{{ $errors->first('content') }}</span>
                      @endif
                    </div>
                    <div class="my-2">
                      <label for="metakey">Từ Khóa</label>
                      <textarea name="metakey" id="metakey" class="form-control" placeholder="nhập từ khóa">{{old('metakey')}}</textarea>
                      @if($errors->has('metakey'))
                      <span class="text-danger">{{ $errors->first('metakey') }}</span>
                      @endif
                    </div>
                    <div class="my-2">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập mô tả">{{old('metadesc')}}</textarea>
                      @if($errors->has('metadesc'))
                      <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="my-2">
                    <label for="topic">Chủ đề bài viết</label>
                      <select name="topid" id="topid" class="form-control">
                        <option value="">Chủ đề bài viết</option>
                        @foreach ($list_topic as $topic)
                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('topid'))
                      <span class="text-danger">{{ $errors->first('topid') }}</span>
                      @endif
                  </div>
                  <div class="my-2">
                    <label for="img">Hình ảnh</label>
                    <input type="file" id = "img" name = "img" class="form-control">
                    @if(session('imgerror'))
                  <span class="text-danger">{{ session('imgerror') }}</span>
                  @endif
                  @if($errors->has('img'))
                  <span class="text-danger">{{ $errors->first('img') }}</span>
                  @endif
                  </div>
                  <div class="my-2">
                    <label for="status">Trạng thái</label>
                      <select name="status" id="status" class="form-control">
                          <option value="1">Xuất bản</option>
                          <option value="2">Chưa xuất bản</option>
                      </select>
                  </div>
                </div>
              </div>
            </section>
          </div>
        
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</form>
    
@endsection