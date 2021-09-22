@extends('layouts.admin')

@section('title')
  <title>Add Permission </title>
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Permission','key' => 'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('permissions.store')}}" method="POST"> 
                  @csrf
                    

                    <div class="form-group">
                        <label>Chọn tên module</label>
                        <select  class="form-control" name="module_parent">
                            <option value="Chọn tên module">Chọn tên module</option>
                            @foreach (config('permissions.table_module') as $moduleItem)
                            
                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <div class="row " >
                            @foreach (config('permissions.module_children') as $moduleItemchildren)
                                
                           
                            <div class="col-md-3">
                                <label for="">
                                    <input type="checkbox" name="module_children[]" id=""  value="{{ $moduleItemchildren }}">
                                    {{ $moduleItemchildren }}
                                </label>
                            </div>
                            @endforeach
                           
                            
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        </div>
        
      </div>
    </div>
    
  </div>
@endsection

