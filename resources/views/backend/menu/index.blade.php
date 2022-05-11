@extends('layouts.admin');
@section('title', 'Quản lý Menu')
@section('maincontent')

<form name="form1" action="{{ route('menu.store') }}" method="POST">
  @csrf
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-6">
                <strong class="text-danger">Quản lý Menu</strong>
              </div>
              <div class="col-md-6 text-right">
                  <a href="{{route('menu-trash')}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          <div class="row">
            <div class="col-md-3">
              <div class="accordion" id="accordionExample">

                <div class="card">
                  <div class="card-header" id="headingPosition">
                      <select name="position" class="form-control" id="">
                          <option value="mainmenu">Main Menu </option>
                          <option value="rightmenu">Right Menu </option>
                          <option value="footermenu1">Footer Menu 1 </option>
                          <option value="footermenu2">Footer Menu 2 </option>
                          <option value="footermenu3">Footer Menu 3 </option>
                      </select>
                  </div>
              </div>
                <div class="card">
                    <div class="card-header" id="headingCategory">
                        <span>Danh mục sản phẩm</span>
                        <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div id="collapseCategory" class="collapse p-2 m-2" aria-labelledby="headingCategory" data-parent="#accordionExample">
                      @foreach ($list_category as $category)
                      <fieldset class="form-group">
                        <input name="nameCategory[]" value="{{$category->id}}" id="category{{$category->id}}" type="checkbox">
                        <label for="category{{$category->id}}">{{$category->name}}</label>
                    </fieldset>
                      @endforeach
                      <fieldset class="form-group">
                        <select name="parentid" class="form-control" id="">
                            <option value="0">Menu cha </option>
                            @foreach ($list as $mn)
                            <option value="{{$mn->id}}">{{$mn->name}} </option>
                            @endforeach
                        </select>
                      </fieldset>
                        <fieldset class="form-group">
                            <input type="submit" name="ThemCategory" value="Thêm" class="btn btn-success form-control">
                        </fieldset>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTopic">
                        <span>Chủ đề bài viết</span>
                        <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div id="collapseTopic" class="collapse p-2 m-2" aria-labelledby="headingTopic" data-parent="#accordionExample">
                      @foreach ($list_topic as $topic)
                      <fieldset class="form-group">
                          <input name="nameTopic[]" value="{{$topic->id}}" id="topic{{$topic->id}}" type="checkbox">
                          <label for="topic{{$topic->id}}">{{$topic->name}}</label>
                      </fieldset>
                      @endforeach

                      <fieldset class="form-group">
                        <select name="parentid" class="form-control" id="">
                            <option value="0">Menu cha </option>
                            @foreach ($list as $mn)
                            <option value="{{$mn->id}}">{{$mn->name}} </option>
                            @endforeach
                        </select>
                      </fieldset>

                      <fieldset class="form-group">
                          <input type="submit" name="ThemTopic" value="Thêm" class="btn btn-success form-control">
                      </fieldset>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingPage">
                        <span>Trang đơn</span>
                        <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div id="collapsePage" class="collapse p-2 m-2" aria-labelledby="headingPage" data-parent="#accordionExample">
                      @foreach ($list_page as $page)
                      <fieldset class="form-group">
                          <input name="namePage[]" value="{{$page->id}}" id="Page{{$page->id}}" type="checkbox">
                          <label for="Page{{$page->id}}">{{$page->title}}</label>
                      </fieldset>
                      @endforeach

                      <fieldset class="form-group">
                        <select name="parentid" class="form-control" id="">
                            <option value="0">Menu cha </option>
                            @foreach ($list as $mn)
                            <option value="{{$mn->id}}">{{$mn->name}} </option>
                            @endforeach
                        </select>
                      </fieldset>

                      <fieldset class="form-group">
                            <input type="submit" name="ThemPage" value="Thêm" class="btn btn-success form-control">
                        </fieldset>
                    </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingSupplier">
                      <span>Nhà cung cấp</span>
                      <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseSupplier" aria-expanded="true" aria-controls="collapsePage">
                          <i class="fas fa-plus"></i>
                      </span>
                  </div>
                  <div id="collapseSupplier" class="collapse p-2 m-2" aria-labelledby="headingSupplier" data-parent="#accordionExample">
                    @foreach ($list_supplier as $supplier)
                    <fieldset class="form-group">
                        <input name="nameSupplier[]" value="{{$supplier->id}}" id="supplier{{$supplier->id}}" type="checkbox">
                        <label for="supplier{{$supplier->id}}">{{$supplier->name}}</label>
                    </fieldset>
                    @endforeach

                    <fieldset class="form-group">
                      <select name="parentid" class="form-control" id="">
                          <option value="0">Menu cha </option>
                          @foreach ($list as $mn)
                          <option value="{{$mn->id}}">{{$mn->name}} </option>
                          @endforeach
                      </select>
                    </fieldset>

                    <fieldset class="form-group">
                          <input type="submit" name="ThemSupplier" value="Thêm" class="btn btn-success form-control">
                      </fieldset>
                  </div>
              </div>

                <div class="card">
                    <div class="card-header" id="headingCustom">
                        <span>Tùy chỉnh</span>
                        <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true" aria-controls="collapseCustom">
                            <i class="fas fa-plus"></i>
                        </span>

                    </div>

                    <div id="collapseCustom" class="collapse p-2 m-2" aria-labelledby="headingCustom" data-parent="#accordionExample">
                        <fieldset class="form-group">
                            <label>Tên menu</label>
                            <input name="name" class="form-control" id="checkid" type="text">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Liên kết</label>
                            <input name="link" class="form-control" type="text">
                        </fieldset>

                        <fieldset class="form-group">
                          <select name="parentid" class="form-control" id="">
                              <option value="0">Menu cha </option>
                              @foreach ($list as $mn)
                              <option value="{{$mn->id}}">{{$mn->name}} </option>
                              @endforeach
                          </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <input type="submit" name="ThemCustom" value="Thêm" class="btn btn-success form-control">
                        </fieldset>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-9">
              <table class="table table-striped table-bordered" id="myTable">
                <thead>
                  <tr class="bg-info">
                      <th class="text-center" style="width:20px;">#</th>
                      <th style="min-width:180px;">Tên Menu</th>
                      <th style="max-width:150px;">Liên kết</th>
                      <th>Loại menu</th>
                      <th>VỊ trí</th>
                      <th style="width:250px;">Chức năng</th>
                      <th class="text-center" style="width:20px;">ID</th>
                      <th>Menu cha</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($list as $row)
                  <tr>
                      <td class="text-center" style="width:20px;">
                          <input type="checkbox" name="checkboxid" id="value">
                      </td>
                      <td style="min-width:180px;">{{ $row->name }}</td>
                      <td style="max-width:150px;">{{ $row->link }}</td>
                      <td>{{ $row->type }}</td>
                      <td>{{ $row->position }}</td>
                      <td style="width:250px;" class="text-center">
  
                        @if($row->status == 1)
                    <a href="{{ route('menu.status',['id' => $row -> id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-toggle-on"></i></a>
                        @else
                    <a href="{{ route('menu.status',['id' => $row -> id]) }}" class="btn btn-sm" style="background: #cccccc"><i class="fas fa-toggle-off"></i></a>
                        @endif
  
                    <a href="{{ route('menu.deltrash',['id' => $row -> id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      
                      </td>
                      <td class="text-center" style="width:20px;">{{ $row->id }}</td>
                      <td>
                        @if ($row->parentid ==0)
                            Cha
                        @else
                            @foreach ($list as $prid)
                                @if ($prid->id == $row->parentid)
                                    {{$prid->name}}
                                @endif
                            @endforeach
                        @endif
                      </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>
@endsection