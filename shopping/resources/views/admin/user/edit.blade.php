@extends('layouts.admin')

@section('title')
  <title>Edit User</title>
@endsection
@section('css')

<link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet" />
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />

@endsection
@section('js')

<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add/add.js')}}"></script>

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'User','key' => 'Edit'])
    <form action="{{ route('users.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
            <div class="content">
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"
                                       name="name" class="form-control " 
                                       placeholder="Nhập tên" value="{{$user->name}}">

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                       name="email" class="form-control" 
                                       placeholder="Nhập email" value="{{$user->email}}">

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       name="password" class="form-control" 
                                       placeholder="Nhập password" value="{{$user->password}}">

                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" id="" multiple>
                                    <option value=""></option>
                                @foreach($roles as $role)
                                    <option
                                    {{ $rolesOfUSer->contains('id',$role->id) ? 'selected' : ''}}
                                     value="{{$role->id}}">{{$role->name}}</option>
                                    
                                    @endforeach
                                </select>

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

