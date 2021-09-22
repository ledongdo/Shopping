@extends('layouts.admin')

@section('title')
  <title>Setting</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('admins/setting/add/add.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Setting','key' => 'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('settings.store') . '?type=' . request()->type}}" method="POST"> 
                  @csrf
                    <div class="form-group">
                        <label>Config key</label>
                        <input type="text" name="config_key"class="form-control @error('config_key') is-invalid @enderror" 
                        placeholder="Nhập config key" >
                    </div>
                    @error('config_key')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if(request()->type === 'Text')
                        <div class="form-group">
                            <label>Config value</label>
                            <input type="text" name="config_value"class="form-control @error('config_value') is-invalid @enderror" 
                            placeholder="Nhập config value">
                        </div>
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @elseif(request()->type === 'Textarea')
                            <label for="">Config Value</label>
                            <textarea  name="config_value" class="form-control @error('config_value') is-invalid @enderror"
                            rows="4" >
                        </textarea>
                        @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    @endif
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

