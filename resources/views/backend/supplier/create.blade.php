@extends('layouts.admin');
@section('title', 'Thêm nhà cung cấp')
@section('maincontent')

<form name="form1" action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-7">
                <strong class="text-danger">Thêm nhà cung cấp</strong>
              </div>
              <div class="col-md-5 text-right">
                  <button class="btn btn-sm btn-success" type = "submit"><i class="fas fa-save"></i> Lưu</button>
                  <a href="{{route('supplier.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        @includeIf('backend.message')
        <div class="card-body">
            <section class = "content">
              <div class="row">
                <div class="col-md-9">
                    <div class="my-2">
                      <label for="name">Tên nhà cung cấp</label>
                      <input type="text" value="{{old('name')}}" id = "namesupplier" name = "name" class="form-control" placeholder="Nhập tên nhà cung cấp">
                    @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="siteurl">Website</label>
                      <input type="url" value="{{old('siteurl')}}" id = "siteurl" name = "siteurl" class="form-control" placeholder="Nhập url">
                    @if($errors->has('siteurl'))
                    <span class="text-danger">{{ $errors->first('siteurl') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="logo">LOGO</label>
                      <input type="file" value="{{old('logo')}}" id = "logo" name = "logo" class="form-control" placeholder="Nhập url">
                    @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="address">Địa chỉ</label>
                      <input type="text" value="{{old('address')}}" id = "address" name = "address" class="form-control" placeholder="Nhập tên địa chi">
                    @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="metakey">Từ Khóa</label>
                      <textarea name="metakey" value="{{old('metakey')}}" id="metakey" class="form-control" placeholder="nhập từ khóa"></textarea>
                      @if($errors->has('metakey'))
                      <span class="text-danger">{{ $errors->first('metakey') }}</span>
                      @endif
                    </div>
                    <div class="my-2">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc" value="{{old('metadesc')}}" id="metadesc" class="form-control" placeholder="Nhập mô tả"></textarea>
                      @if($errors->has('metadesc'))
                      <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="my-2">
                    <label for="fullname">Tên người đại diện</label>
                    <input type="text" value="{{old('fullname')}}" id = "fullname" name = "fullname" class="form-control" placeholder="Nhập tên người đại diện">
                  @if($errors->has('fullname'))
                  <span class="text-danger">{{ $errors->first('fullname') }}</span>
                  @endif
                  </div>
                  <div class="my-2">
                    <label for="phone">Điện thoại</label>
                    <input type="text" value="{{old('phone')}}" id = "phone" name = "phone" class="form-control" placeholder="Nhập số điện thoại">
                  @if($errors->has('phone'))
                  <span class="text-danger">{{ $errors->first('phone') }}</span>
                  @endif
                  </div>
                  <div class="my-2">
                    <label for="email">Email</label>
                    <input type="email" value="{{old('email')}}" id = "email" name = "email" class="form-control" placeholder="Nhập email">
                  @if($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
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