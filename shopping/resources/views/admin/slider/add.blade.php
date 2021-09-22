@extends('layouts.admin')

@section('title')
  <title>Add product</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/slider/add/add.css')}}" rel="stylesheet" />
@endsection
<!-- ----- -->
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/slider/add/add.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Slider','key' => 'Add'])
    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            <div class="content">
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text"
                                       name="name" class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                                       @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                               
                                       <textarea name="description"
                                       class="form-control @error('description') is-invalid @enderror" 
                                       placeholder="Nhập mô tả" rows="4">
                                       {{old('description')}}
                                    </textarea>
                                       @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                               
                            </div>

                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image_path"
                                >
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

