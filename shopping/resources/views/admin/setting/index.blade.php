@extends('layouts.admin')

@section('title')
  <title>Setting</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('admins/setting/index/js.css')}}">
  
@endsection
@section('js')
  <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
  
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Setting' , 'key'=>'List' ])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group Add_setting">
                <a class="btn dropdown-toggle btn-add" data-toggle="dropdown" href="#">
                    Add setting
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('settings.create'). '?type=Text'}}">Text</a></li>
                    <li><a href="{{route('settings.create'). '?type=Textarea'}}">Textarea</a></li>
                </ul>
            </div>
            
          </div>
          
          <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Config key</th>
              <th scope="col">Config value</th>
              <th scope="col">Acion</th>
            </tr>
          </thead>
          <tbody>
           @foreach($settings as $setting)
              <tr>
                <th scope="1">{{$setting ->id}}</th>
                <td>{{$setting ->config_key}}</td>
                <td>{{$setting ->config_value}}</td>
                
                <td>
                  <a href="{{route('settings.edit',['id'=>$setting->id]) . '?type=' . $setting->type}}" class="btn btn-primary">Edit</a>
                  <a href=""
                  data-url="{{route('settings.delete',['id'=>$setting->id])}}" class="btn btn-danger action_delete">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <div class="col-md-12">
            {{$settings->links()}}
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

