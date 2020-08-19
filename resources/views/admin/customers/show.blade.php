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
                         {{$customer->adress}}
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
  {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i>Eliminar</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
     {{-- modal para agregar pdf al documento --}}
    <div class="modal modal-info fade" tabindex="-1" id="add_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-archive"></i>Agregar</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="add_form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                                    <label for="">Seleccione el archivo</label>
                                    <input type="file" name="archivo"  accept=".pdf">
                        </div>
                        <input type="submit" class="btn btn-info pull-right delete-confirm" value="{{ __('Si registrar') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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