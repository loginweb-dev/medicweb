<div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            @php
                $cont = 0;
            @endphp
            @forelse ($observaciones as $item)
            <li>
                <a href="#">{{ $item->observations }}</a>
                <a href="#" class="float-right">{{ strftime("%d de %B, %Y",  strtotime($item->created_at)) }}</a>
                @if (count($item->observaciones) > 1)
                    @forelse ($item->observaciones as $observacion)
                        @if ($cont == 0)
                            <p>{{ $observacion->description }} <button type="button" class="btn btn-link btn-learn-more" id="btn-learn-more-{{ $item->id }}" data-id="{{ $item->id }}">Ver más</button></p>
                        @else
                            <p class="text-hidden text-{{ $item->id }}">{{ $observacion->description }}</p>
                        @endif
                        @php
                            $cont++;
                        @endphp
                    @empty
                    <p class="text-center">No hay histotial</p>
                    @endforelse
                @else
                    @if (count($item->observaciones) > 0)
                        <p>{{ $item->observaciones[0]->description }}</p>
                    @else
                        <p class="text-center">No hay histotial</p>
                    @endif
                @endif
            </li>
            @empty
                <h3 class="text-center">No hay histotial</h3>
            @endforelse
        </ul>
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