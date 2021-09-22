@extends('layouts.admin')

@section('title')
  <title>Menus</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Menu' , 'key'=>'List' ])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2" >Add</a>
          </div>
          
          <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên menu</th>
              <th scope="col">Acion</th>
            </tr>
          </thead>
          <tbody>
           @foreach($menus as $menu)
              <tr>
                <th scope="1">{{$menu->id}}</th>
                <td>{{$menu->name}}</td>
                <td>
                  <a href="{{route('menus.edit',['id'=>$menu->id])}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('menus.delete',['id'=>$menu->id])}}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <div class="col-md-12">
            {{$menus->links()}}
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

