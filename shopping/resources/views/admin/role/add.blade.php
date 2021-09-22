@extends('layouts.admin')

@section('title')
  <title>Add role</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/role/add/add.css')}}" rel="stylesheet" />
    
@endsection
<!-- ----- -->
@section('js')

    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/role/add/add.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Role','key' => 'Add'])
    <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
            <div class="content">
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       name="name" class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Nhập tên vao trò" value="{{old('name')}}">                               
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                               
                                       <textarea name="display_name"
                                       class="form-control @error('description') is-invalid @enderror" 
                                       placeholder="Nhập mô tả" rows="4">
                                       {{old('display_name')}}
                                    </textarea>                             
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">   
                                <div class="col-md-12">
                                    <label for="">
                                        <input type="checkbox" class="checkall" name="" id="">
                                        checkall
                                    </label>    
                                </div>                                                               
                                @foreach ($permissionsParent as $permissionsParentItem )
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header">
                                        <label for="">
                                            <input type="checkbox" name="" class="checkbox_wrapper">
                                        </label>
                                        Module {{ $permissionsParentItem->name }}
                                    </div>
                                    <div class="row">
                                        @foreach ($permissionsParentItem->PermissionsChildren as $PermissionsChildrenItem )
                                        
                                            <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label for="">
                                                    <input type="checkbox" name="permission_id[]" class="checkbox_children"
                                                      value="{{$PermissionsChildrenItem->id}}">
                                                </label>
                                                {{ $PermissionsChildrenItem->name }}
                                                </h5>                                            
                                            </div>
                                        @endforeach
                                    </div>                                    
                                                                  
                                </div>
                                @endforeach                               
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>


                    
                </div>
            </div>
        </form>

  </div>
  
@endsection

