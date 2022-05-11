@extends('layouts.admin');
@section('title', 'Cập nhập chủ đề bài viết')
@section('maincontent')

<form name="form1" action="{{ route('topic.update',['topic' => $topic->id]) }}" method="POST">
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
                <strong class="text-danger">Cập nhập chủ đề bài viết</strong>
              </div>
              <div class="col-md-5 text-right">
                  <button class="btn btn-sm btn-success" type = "submit"><i class="fas fa-save"></i> Lưu</button>
                  <a href="{{route('topic.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        @includeIf('backend.message')
        <div class="card-body">
            <section class = "content">
              <div class="row">
                <div class="col-md-9">
                    <div class="my-2">
                      <label for="nametopic">Tên chủ đề</label>
                      <input type="text" value="{{old('name', $topic->name)}}" id = "nametopic" name = "name" class="form-control" placeholder="Nhập tên danh mục">
                    @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="metakey">Từ Khóa</label>
                      <textarea name="metakey"  id="metakey" class="form-control" placeholder="nhập từ khóa">{{old('metakey', $topic->metakey)}}</textarea>
                      @if($errors->has('metakey'))
                      <span class="text-danger">{{ $errors->first('metakey') }}</span>
                      @endif
                    </div>
                    <div class="my-2">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc"  id="metadesc" class="form-control" placeholder="Nhập mô tả">{{old('metadesc', $topic->metadesc)}}</textarea>
                      @if($errors->has('metadesc'))
                      <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="my-2">
                    <label for="parentid">Chủ đề cha cha</label>
                      <select name="parentid" id="parentid" class="form-control">
                        <option value="0">Danh mục cha</option>
                        @foreach ($list_topic as $row_topic)
                        @if ($row_topic->id == $topic->parentid)
                        
                        <option selected value="{{$row_topic->id}}">{{$row_topic->name}}</option>
                        @else
                        <option value="{{$row_topic->id}}">{{$row_topic->name}}</option>
                        @endif
                        @endforeach
                      </select>
                  </div>
                  <div class="my-2">
                    <label for="orders">Sắp xếp</label>
                      <select name="orders" id="orders" class="form-control">
                          <option value="0">Sắp xếp</option>
                          @foreach ($list_topic as $row_topic)
                          <option value="{{$row_topic->orders}}">Sau: {{$row_topic->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="my-2">
                    <label for="status">Trạng thái</label>
                      <select name="status" id="status" class="form-control">
                          <option value="1" @php echo($topic->status == 1) ? 'selected':'' @endphp>Xuất bản</option>
                          <option value="2" @php echo($topic->status == 2) ? 'selected':'' @endphp>Chưa xuất bản</option>
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