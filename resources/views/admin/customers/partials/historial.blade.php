@php
    $cont = 0;
    setlocale(LC_ALL,"es_ES");
    $class_collapse = 'show';
@endphp
<div class="row">
    <div class="col-md-12">
        <div id="accordion">
            @forelse ($observaciones as $item)
                <div class="card">
                    <div class="card-header" id="heading-{{ $item->id }}" data-toggle="collapse" data-target="#collapse-{{ $item->id }}" aria-expanded="true" aria-controls="collapse-{{ $item->id }}" style="cursor: pointer">
                        <h5 class="panel-title">{{ $item->observations }} <br> <small>{{ strftime("%d de %B, %Y",  strtotime($item->created_at)) }}</small></h5>
                    </div>
                    <div id="collapse-{{ $item->id }}" class="collapse" aria-labelledby="heading-{{ $item->id }}" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="timeline mb-3">
                                @if (count($item->details) > 1)
                                    @forelse ($item->details as $detail)
                                        <li>
                                            @if ($cont == 0)
                                                <p>{{ $detail->description }} <button type="button" class="btn btn-link btn-learn-more" id="btn-learn-more-{{ $item->id }}" data-id="{{ $item->id }}">Ver más</button></p>
                                            @else
                                                <p class="text-hidden text-{{ $item->id }}">{{ $detail->description }}</p>
                                            @endif
                                            @php
                                                $cont++;
                                            @endphp
                                        </li>
                                    @empty
                                    <p class="text-center">No hay observaciones</p>
                                    @endforelse
                                @else
                                    @if (count($item->details) > 0)
                                        <p>{{ $item->details[0]->description }}</p>
                                    @else
                                        <p class="text-center">No hay observaciones</p>
                                    @endif
                                @endif
                            </ul>
                            @if (count($item->prescription) && count($item->analysis))
                                <div class="row" style="margin-top:60px">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Prescipciones</td>
                                                <td>Ordenes de laboratorio</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @foreach ($item->prescription as $receta)
                                                        @foreach ($receta->details as $detail)
                                                            <h5>{{ intval($detail->quantity) }} {{ $detail->medicine_name }} <br> <small>{{ $detail->medicine_description }}</small></h5>
                                                        @endforeach
                                                        <hr>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($item->analysis as $orden)
                                                            @foreach ($orden->details as $detail)
                                                                <li>{{ $detail->analysis->name }}</li>
                                                            @endforeach
                                                            <hr>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $class_collapse = '';
                @endphp
            @empty
                <h3 class="text-center">No hay historial</h3>
            @endforelse
        </div>
    </div>
</div>
  

<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .text-hidden{
        display: none
    }
</style>

<script>
    $('.btn-learn-more').click(function(){
        let id = $(this).data('id');
        $(`.text-${id}`).css('display', 'block');
        $(`#btn-learn-more-${id}`).css('display', 'none');
    });
</script>