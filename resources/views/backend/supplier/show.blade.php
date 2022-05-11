@extends('layouts.admin')
@section('title', 'Chi tiết nhà cung cấp')
@section('maincontent')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-6">
                  <strong class="text-danger">
                    Chi tiết nhà cung cấp
                  </strong>
                  <div class="col-md-6 text-right">
                         <a href="{{route('supplier.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
                  </div>
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
                 <td>{{$supplier->id}}</td>
             </tr>
             <tr>
                <td>Tên danh mục</td>
                <td>{{$supplier->name}}</td>
            </tr>
            <tr>
                <td>Slug</td>
                <td>{{$supplier->slug}}</td>
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