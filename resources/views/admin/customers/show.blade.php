@extends('voyager::master')

@section('page_title', __('Customer'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-eye"></i>Cliente N° {{$customer->id}}
        </h1>
        <a href="{{ route('customers.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </div>
@stop

@section('content')
<div class="page-content read container-fluid">
      <div class="panel panel-bordered" style="padding-bottom:5px;">
        <div class="panel-heading" style="border-bottom:0;">
               <h3 class="panel-title">Customer</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nombre Completo.</label>
                        <p>{{$customer->text}}</p>
                    </div>
                     <div class="form-group">
                        <label>Telefonos</label>
                        <pre style="text-align: left; white-space: pre-line;"> 
                         {{$customer->phones}}
                        </pre>
                    </div>
                    <div class="form-group">
                        <label>Direccion</label>
                        <pre style="text-align: left; white-space: pre-line;">
                         {{$customer->address}}
                        </pre>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nombre de Usuario:</label>
                      <p>{{$customer->user->name}}</p>
                    </div>
                    <div class="form-group">
                     <label>Imagen</label>
                       @isset($customer->user->avatar)
                       <div style="text-align:left; margin-top: 10px">
                            <input type='file' name="avatar" class="input-preview" id="input-preview" />
                            <img class="img-thumbnail img-preview" id="img-preview" data-toggle="tooltip" title="Has click para agregar una imagen" alt="avatar" />
                        </div>
                        @endisset
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@stop


@section('css')
   
@stop

@section('javascript')
<script src="{{ url('js/plugins/image-preview.js') }}"></script>
  <script>
    $(function () {
      $('#DataTable').DataTable()
    })
     
  </script>
@stop