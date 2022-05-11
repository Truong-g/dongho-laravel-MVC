@extends('layouts.admin');
@section('title', 'Cập nhập trang đơn')


@section('footer')
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
         CKEDITOR.replace('content')
    </script>
@endsection


@section('maincontent')

<form name="form1" action="{{ route('page.update',['page' => $post->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-7">
                <strong class="text-danger">Cập nhập trang đơn</strong>
              </div>
              <div class="col-md-5 text-right">
                <button class="btn btn-sm btn-success" type = "submit"><i class="fas fa-save"></i> Lưu</button>
                <a href="{{route('page.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
            </div>
          </div>
        </div>
        @includeIf('backend.message')
        <div class="card-body">
            <section class = "content">
              <div class="row">
                <div class="col-md-9">
                    <div class="my-2">
                      <label for="title">Tiêu đề trang đơn</label>
                      <input type="text" value="{{old('title', $post->title)}}" id = "title" name = "title" class="form-control" placeholder="Nhập tên trang đơn">
                    @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="content">Chi tiết</label>
                      <textarea name="content"  id="content" class="form-control" placeholder="Nhập chi tiết trang đơn">{{old('content', $post->content)}}</textarea>
                      @if($errors->has('content'))
                      <span class="text-danger">{{ $errors->first('content') }}</span>
                      @endif
                    </div>
                    <div class="my-2">
                      <label for="metakey">Từ Khóa</label>
                      <textarea name="metakey" id="metakey" class="form-control" placeholder="nhập từ khóa">{{old('detail', $post->metakey)}}</textarea>
                      @if($errors->has('metakey'))
                      <span class="text-danger">{{ $errors->first('metakey') }}</span>
                      @endif
                    </div>
                    <div class="my-2">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập mô tả">{{old('detail', $post->metadesc)}}</textarea>
                      @if($errors->has('metadesc'))
                      <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-3">
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
                        <option value="1" @php echo($post->status == 1) ? 'selected':'' @endphp>Xuất bản</option>
                        <option value="2" @php echo($post->status == 2) ? 'selected':'' @endphp>Chưa xuất bản</option>
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