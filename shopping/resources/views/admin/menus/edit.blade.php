@extends('layouts.admin')

@section('title')
  <title>Edit Menus</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'menu','key' => 'Edit'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('menus.update',['id'=>$menuFolowIdEdit->id])}}" method="POST"> 
                  @csrf
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="name" class="form-control" 
                        value="{{$menuFolowIdEdit->name}}"
                        placeholder="Nhập tên menu">
                    </div>

                    <div class="form-group">
                        <label>Chọn danh mục cha</label>
                        <select  class="form-control" name="parent_id">
                            <option value="0">Chọn menu cha</option>
                            {!!$optionSelect!!}
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

