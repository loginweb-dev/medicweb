@extends('voyager::master')
@section('css')
    <style>
        select{
            font-family: fontAwesome
        }
        .placeholder-sortable{
            margin: 30px 0px;
            background-color: #E5E5E5;
            height: 80px;
        }
    </style>
@endsection

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
            - {{ $page->name }}
        </h1>
        <a href="{{ route('voyager.pages.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
        <a href="{{ route('voyager.blocks.create') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;
            Nuevo Blocke
        </a>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid" id="voyagerBreadEditAdd">
        @include('voyager::alerts')
        <div class="col-md-12">
            <ul class="list-group" style="list-style: none" id="sortable">
                @foreach ($blocks as $block)
                    <li class="section-sortable" data-id="{{ $block->id }}">
                        <div class="panel panel-primary panel-bordered">
                            
                            <div class="panel-heading" style="cursor: move">
                                <h3 class="panel-title panel-icon"><i class="voyager-bread"></i>{{ $block->title }}</h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-up" data-toggle="panel-collapse"></a>
                                </div>
                            </div>

                            <div class="panel-body">
                                <form class="miform" action="{{ route('block_update', $block->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="panel panel-success text-center">
                                        <h3>{{ $block->description }}</h3>
                                
                                        <a href="{{ route('block_move_up', $block->id) }}">
                                            <i class="sort-icons fa-lg voyager-sort-asc"></i>
                                        </a>
                                        <a href="{{ route('block_move_down', $block->id) }}">
                                            <i class="sort-icons fa-lg voyager-sort-desc"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
                                
                                    @switch($block->type)
                                        @case('dinamyc-data')
                                            @if($block->details)
                                                @foreach (json_decode($block->details, true) as $item => $value)
                                                    @switch($value['type'])
                                                        @case('text')
                                                        
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <input type="text" class="form-control" name="{{ $value['name'] }}" placeholder="" value="{{ $value['value'] }}">
                                                            </div>
                                                            @break
                                                        @case('rich_text_box')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <textarea class="ckeditor" name="{{ $value['name'] }}" rows="5">{{ $value['value'] }}</textarea>
                                                            </div>
                                                            @break
                                                        @case('text_area')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <textarea class="form-control" name="{{ $value['name'] }}" rows="3">{{ $value['value'] }}</textarea>
                                                            </div>
                                                            @break
                                                        @case('image')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                {{--  <a href="#" class="voyager-x remove-single-image" style="position:absolute;">Delete</a>  --}}
                                                                <img src="{{ Voyager::Image($value['value']) }}" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                                                <input type="file" value="{{ $value['value'] }}" name="{{ $value['name'] }}" accept="image/*">
                                                                {{--  <input type="hidden" name="{{ $value['name'] }}-aux" value="{{ $value['value'] }}" />  --}}
                                                            </div>
                                                            @break
                                                        @case('select_dropdown')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                @php
                                                                    $miarray = [
                                                                        'fas fa-cogs blue-text',
                                                                        'fas fa-book blue-text',
                                                                        'fas fa-users blue-text',
                                                                        'fas fa-tablet-alt blue-text',
                                                                        'fas fa-level-up-alt blue-text',
                                                                        'fas fa-phone blue-text',
                                                                        'far fa-object-group blue-text',
                                                                        'fas fa-rocket blue-text',
                                                                        'fas fa-cloud-upload-alt blue-text',
                                                                        'fas fa-home blue-text',
                                                                        'fas fa-users white-text',
                                                                        'fas fa-chart-bar blue-text',
                                                                        'far fa-calendar-alt mr-2',
                                                                        'fas fa-cogs orange-text fa-2x',
                                                                        'fas fa-edit orange-text fa-2x',
                                                                        'fas fa-comments orange-text fa-2x',
                                                                        'fab fa-whatsapp-square orange-text fa-2x',
                                                                        'fab fa-whatsapp orange-text fa-2x',
                                                                        'fab fa-youtube orange-text fa-2x',
                                                                        'fab fa-youtube-square orange-text fa-2x',
                                                                        'fas fa-video orange-text fa-2x',
                                                                        'fas fa-photo-video orange-text fa-2x',
                                                                        'fas fa-hand-holding-usd orange-text fa-2x',
                                                                        'fas fa-laptop dark-grey-text mr-2',
                                                                        'fas fa-mobile-alt dark-grey-text mr-3',
                                                                        'fas fa-tablet-alt dark-grey-text mr-3',
                                                                        'fas fa-headphones-alt dark-grey-text mr-3',
                                                                        'fas fa-camera-retro dark-grey-text mr-3',
                                                                        'fas fa-suitcase dark-grey-text mr-3',
                                                                        'fas fa-tv dark-grey-text mr-3'
                                                                    ];
                                                                @endphp
                                                                <label>{{ $value['label'] }}</label>
                                                                <select class="form-control select2 miselect" name="{{ $value['name'] }}">
                                                                <option disabled>-- Seleciona un icons --</option>
                                                                    @foreach ($miarray as $item)
                                                                        <option value="{{ $item }}" @if($value['value'] === $item)selected="selected"@endif>
                                                                            {{ $item }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @break
                                                        @case('space')
                                                            <div class="col-md-12">
                                                                <hr />
                                                            </div>
                                                            @break
                                                        @case('number')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <input type="number" class="form-control" name="{{ $value['name'] }}"  placeholder="" value="{{ $value['value'] }}">
                                                            </div>
                                                            @break
                                                        @case('checkbox')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <br />
                                                                <input type="checkbox" name="{{ $value['name']  }}" class="toggleswitch"
                                                                data-on="on" {!! $value['value'] ? 'checked="checked"' : '' !!}
                                                                data-off="off">
                                                            </div>
                                                            @break
                                                    @endswitch
                                                @endforeach
                                            @else
                                                <div class="text-center">
                                                    <code>No hay Detalles</code>
                                                </div>
                                            @endif
                                            @break
                                        @case('controller')
                                            @if($block->details)
                                                @foreach (json_decode($block->details, true) as $item => $value)
                                                    @switch($value['type'])
                                                        @case('text')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <input type="text" class="form-control" name="{{ $value['name'] }}" placeholder="" value="{{ $value['value'] }}">
                                                            </div>
                                                            @break
                                                        @case('text_area')
                                                            <div class="form-group col-md-{{ $value['width'] }}">
                                                                <label>{{ $value['label'] }}</label>
                                                                <textarea class="form-control" name="{{ $value['name'] }}" rows="3">{{ $value['value'] }}</textarea>
                                                            </div>
                                                            @break
                                                        @case('space')
                                                            <div class="col-md-12">
                                                                <hr />
                                                            </div>
                                                            @break
                                                    @endswitch
                                                @endforeach
                                            @else
                                                <div class="text-center">
                                                    <code>No hay Detalles</code>
                                                </div>
                                            @endif
                                            @break                                        
                                        @endswitch
                                    <div class="form-group col-md-12">
                                        <hr />
                                    </div>
                                    <div class="form-group text-center col-md-12">
                                        <button type="submit" class="btn btn-primary"><i class="voyager-edit"></i> Guardar este Blocke</button>
                                        <a href="{{ route('block_delete', $block->id) }}" class="btn btn-danger"><i class="voyager-trash"></i> Eliminar este Blocke</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

@section('javascript')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
    
        $('.miselect').on('change', function () {
            console.log('<i class="'+this.value+'"></i>');
            $('#myicon').html('<i class="'+this.value+'"></i>');
            //toastr.options.escapeHtml = true;
            toastr.info('<i class="'+this.value+'"></i>', 'Icon');
        });

        $(document).ready(function(){
            // Inicializar la lista ordenable
            $('#sortable').sortable({
                placeholder: "placeholder-sortable",
                update: function( event, ui ) {
                    let index = 1;
                    let url = '{{ url("admin/block/order") }}';
                    $('.section-sortable').each(function(){
                        let id = $(this).data("id");
                        $.get(`${url}/${id}/${index}`);
                        // console.log(id, index)
                        index++;
                        
                    });
                    toastr.success("Orden actualizado", "Bien hecho");
                }
            });
            $( "#sortable" ).disableSelection();
            // =============================
        });
        $('.toggleswitch').bootstrapToggle();
    </script>
@endsection