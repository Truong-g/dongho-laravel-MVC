@extends('layouts.admin');
@section('title', 'Thêm slider')
@section('maincontent')

<form name="form1" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-7">
                <strong class="text-danger">Thêm Slider</strong>
              </div>
              <div class="col-md-5 text-right">
                  <button class="btn btn-sm btn-success" type = "submit"><i class="fas fa-save"></i> Lưu</button>
                  <a href="{{route('slider.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        @includeIf('backend.message')
        <div class="card-body">
            <section class = "content">
              <div class="row">
                <div class="col-md-9">
                    <div class="my-2">
                      <label for="name">Tên Slider:</label>
                      <input type="text" value="{{old('name')}}" id = "name" name = "name" class="form-control" placeholder="Nhập tên slider">
                    @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="url">Url:</label>
                      <input type="url" value="{{old('url')}}" id = "url" name = "url" class="form-control" placeholder="Nhập url">
                    @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="img">Hình ảnh:</label>
                      <input type="file" value="{{old('img')}}" id = "img" name = "img" class="form-control" placeholder="Nhập url">
                    @if($errors->has('img'))
                    <span class="text-danger">{{ $errors->first('img') }}</span>
                    @endif
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="my-2">
                    <label for="orders">Sắp xếp</label>
                      <select name="orders" id="orders" class="form-control">
                          <option value="0">Sắp xếp: </option>
                          @foreach ($list_slider as $item)
                          <option value="{{$item->orders}}">Sau: {{$item->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="my-2">
                    <label for="position">Vị trí</label>
                      <select name="position" id="position" class="form-control">
                          <option value="slideshow">Slideshow</option>
                          <option value="smallads">Quảng cáo nhỏ</option>
                          <option value="bigads">Quảng cáo lớn</option>
                      </select>
                  </div>
                  <div class="my-2">
                    <label for="status">Trạng thái</label>
                      <select name="status" id="status" class="form-control">
                          <option value="1">Xuất bản</option>
                          <option value="0">Chưa xuất bản</option>
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