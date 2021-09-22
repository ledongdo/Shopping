@extends('layouts.admin')

@section('title')
  <title>Trang chu</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Do','key' => 'Cute'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            Trang chu
        </div>
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

