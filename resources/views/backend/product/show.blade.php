@extends('layouts.admin');
@section('title', 'Chi tiết danh mục sản phẩm')
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
                      CHI TIẾT SẢN PHẨM
                  </strong>
              </div>
              <div class="col md-6 text-right">
                  <a href="{{route('product.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
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
                 <td>{{$product->id}}</td>
             </tr>
             <tr>
                <td>Hinh ảnh</td>
                <td><img src="{{asset('images/products/'.$product->img)}}" style="width:100px; height: 100px;" alt="{{$product->name}}"></td>
            </tr>
             <tr>
                <td>Tên</td>
                <td>{{$product->name}}</td>
             </tr>
             <tr>
                  <td>Slug</td>
                  <td>{{$product->slug}}</td>
              </tr>
              <tr>
                <td>Loại danh mục</td>
                @foreach ($category as $cat)
                    @if ($product->catid == $cat->id)
                        <td>{{$cat->name}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
              <td>Nhà cung cấp</td>
              @foreach ($supplier as $supp)
                  @if ($product->suppid == $supp->id)
                      <td>{{$supp->name}}</td>
                  @endif
              @endforeach
          </tr>
            <tr>
              <td>Giá</td>
              <td>{{$product->price}}</td>
            </tr>
            <tr>
              <td>Giá khuyến mãi</td>
              <td>{{$product->pricesale}}</td>
            </tr>
            <tr>
              <td>Sô lượng</td>
              <td>{{$product->quantity}}</td>
            </tr>
            <tr>
              <td>Chi tiết</td>
              <td>{{$product->detail}}</td>
            </tr>
            <tr>
              <td>Ngày tạo</td>
              <td>{{$product->created_at->format('H:s d/m/Y')}}</td>
            </tr>
            <tr>
              <td>Người tạo</td>
              @foreach ($users as $user)
                @if ($product->created_by == $user->id)
                    <td>{{$user->fullname}}</td>
                @endif
              @endforeach
            </tr>
            <tr>
              <td>Trạng thái</td>
              @if ($product->status == 1)
                <td>Xuất bản</td>
              @else
                <td>Chưa xuất bản</td>
              @endif
            </tr>
         </table>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection