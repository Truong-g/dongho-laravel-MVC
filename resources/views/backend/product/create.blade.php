@extends('layouts.admin');
@section('title', 'Thêm sản phẩm')


@section('footer')
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
         CKEDITOR.replace('detail')
    </script>
@endsection


@section('maincontent')

<form name="form1" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-7">
                <strong class="text-danger">Thêm sản phẩm</strong>
              </div>
              <div class="col-md-5 text-right">
                  <button class="btn btn-sm btn-success" type = "submit"><i class="fas fa-save"></i> Lưu</button>
                  <a href="{{route('product.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        @includeIf('backend.message')
        <div class="card-body">
            <section class = "content">
              <div class="row">
                <div class="col-md-9">
                    <div class="my-2">
                      <label for="nameproduct">Tên sản phẩm</label>
                      <input type="text" value="{{old('name')}}" id = "nameproduct" name = "name" class="form-control" placeholder="Nhập tên sản phẩm">
                    @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                    <div class="my-2">
                      <label for="detail">Chi tiết</label>
                      <textarea name="detail" value="{{old('detail')}}" id="detail" class="form-control" placeholder="Nhập chi tiết sản phẩm"></textarea>
                      @if($errors->has('detail'))
                      <span class="text-danger">{{ $errors->first('detail') }}</span>
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
                    <div class="my-2">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="my-2">
                            <label for="img">Hình ảnh 1</label>
                            <input type="file" id = "img" name = "img" class="form-control">
                            @if(session('imgerror'))
                          <span class="text-danger">{{ session('imgerror') }}</span>
                          @endif
                          @if($errors->has('img'))
                          <span class="text-danger">{{ $errors->first('img') }}</span>
                          @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="my-2">
                            <label for="img2">Hình ảnh 2</label>
                            <input type="file" id = "img2" name = "img2" class="form-control">
                            @if(session('imgerror'))
                          <span class="text-danger">{{ session('imgerror') }}</span>
                          @endif
                          @if($errors->has('img2'))
                          <span class="text-danger">{{ $errors->first('img2') }}</span>
                          @endif
                          </div>

                          
                        </div>
                        <div class="col-md-3">


                          <div class="my-2">
                            <label for="img3">Hình ảnh 3</label>
                            <input type="file" id = "img3" name = "img3" class="form-control">
                            @if(session('imgerror'))
                          <span class="text-danger">{{ session('imgerror') }}</span>
                          @endif
                          @if($errors->has('img3'))
                          <span class="text-danger">{{ $errors->first('img3') }}</span>
                          @endif
                          </div>

                        </div>
                        <div class="col-md-3">


                          <div class="my-2">
                            <label for="img4">Hình ảnh 4</label>
                            <input type="file" id = "img4" name = "img4" class="form-control">
                            @if(session('imgerror'))
                          <span class="text-danger">{{ session('imgerror') }}</span>
                          @endif
                          @if($errors->has('img4'))
                          <span class="text-danger">{{ $errors->first('img4') }}</span>
                          @endif
                          </div>

                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="my-2">
                    <label for="catid">Danh mục sản phẩm</label>
                      <select name="catid" id="catid" class="form-control">
                        <option value="">Danh mục sản phẩm</option>
                        @foreach ($list_category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('catid'))
                      <span class="text-danger">{{ $errors->first('catid') }}</span>
                      @endif
                  </div>
                  <div class="my-2">
                    <label for="suppid">Nhà cung cấp</label>
                      <select name="suppid" id="suppid" class="form-control">
                          <option value="">Nhà cung cấp</option>
                          @foreach ($list_supplier as $supplier)
                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                          @endforeach
                      </select>
                      @if($errors->has('suppid'))
                      <span class="text-danger">{{ $errors->first('suppid') }}</span>
                      @endif
                  </div>
                  <div class="my-2">
                    <label for="quantity">Số lượng</label>
                    <input type="text" value="{{old('quantity', 1)}}" min="1" id = "quantity" name = "quantity" class="form-control" placeholder="Nhập số lượng">
                  @if($errors->has('quantity'))
                  <span class="text-danger">{{ $errors->first('quantity') }}</span>
                  @endif
                  </div>
                  <div class="my-2">
                    <label for="price">Giá</label>
                    <input type="text" value="{{old('price', 10000)}}" min="10000" id = "price" name = "price" class="form-control" placeholder="Nhập giá">
                  @if($errors->has('price'))
                  <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
                  </div>
                  <div class="my-2">
                    <label for="pricesale">Giá khuyến mãi</label>
                    <input type="text" value="{{old('pricesale', 10000)}}" min="10000" id = "pricesale" name = "pricesale" class="form-control" placeholder="Nhập giá khuyến mãi">
                  @if($errors->has('pricesale'))
                  <span class="text-danger">{{ $errors->first('pricesale') }}</span>
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