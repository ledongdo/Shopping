@extends('layouts.admin')

@section('title')
  <title>Add Sản phẩm</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
<!-- ----- -->
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'product','key' => 'Add'])
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            <div class="content">
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text"
                                       name="name" class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                                       @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text"    
                                       name="price" class="form-control @error('price') is-invalid @enderror" 
                                       placeholder="Nhập giá sản phẩm" value="{{old('price')}}">
                                       @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                               
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="feature_image_path"
                                >
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file mb-2 preview_image_detail"
                                       name="image_path[]">


                            </div>


                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id" >
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                               
                            </div>

                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select " multiple="multiple">

                                </select>

                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea
                                    name="contents"
                                    class="is-invalid form-control tinymce_editer_init @error('contents') is-invalid @enderror"
                                    rows="8" >{{old('contents')}}</textarea>
                                    @error('contents')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>


                    </div>
                </div>
            </div>
        </form>

  </div>
  
@endsection

