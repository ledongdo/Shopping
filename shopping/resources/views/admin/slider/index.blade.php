@extends('layouts.admin')

@section('title')
  <title>product</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('admins/slider/index/list.css')}}">
@endsection
@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Slider' , 'key'=>'List' ])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2" >Add</a>
          </div>
          
          <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên Slider</th>
              <th scope="col">Desciption</th>
              <th scope="col">Anh</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          
           @foreach($sliders as $slider)

            
              <tr>
                <th scope="row">{{$slider->id}}</th>
                <td>{{$slider->name}}</td>
                <td>{{$slider->description}}</td>
                <td>
                  <img src="{{$slider->image_path}}" class="image_slider" alt="">
                </td>
                
                <td>
                  <a href="{{route('slider.edit',['id'=>$slider->id ])}}" class="btn btn-primary">Edit</a>
                  <a data-url="{{route('slider.delete',['id'=>$slider->id ])}}"
                     class="btn btn-danger action_delete">Delete</a>
                </td>
              </tr>
             @endforeach
          </tbody>
        </table>
        </div> 
        

        <div class="col-md-12">
           {{$sliders->links()}}
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

