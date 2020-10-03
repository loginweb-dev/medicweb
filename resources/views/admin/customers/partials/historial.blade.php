<div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            @php
                $cont = 0;
                setlocale(LC_ALL,"es_ES");
            @endphp
            @forelse ($observaciones as $item)
            <li>
                <a href="#">{{ $item->observations }}</a>
                <a href="#" class="float-right">{{ strftime("%d de %B, %Y",  strtotime($item->created_at)) }}</a>
                @if (count($item->details) > 1)
                    @forelse ($item->details as $detail)
                        @if ($cont == 0)
                            <p>{{ $detail->description }} <button type="button" class="btn btn-link btn-learn-more" id="btn-learn-more-{{ $item->id }}" data-id="{{ $item->id }}">Ver más</button></p>
                        @else
                            <p class="text-hidden text-{{ $item->id }}">{{ $observacion->description }}</p>
                        @endif
                        @php
                            $cont++;
                        @endphp
                    @empty
                    <p class="text-center">No hay historial</p>
                    @endforelse
                @else
                    @if (count($item->details) > 0)
                        <p>{{ $item->details[0]->description }}</p>
                    @else
                        <p class="text-center">No hay historial</p>
                    @endif
                @endif
            </li>
            @empty
                <h3 class="text-center">No hay historial</h3>
            @endforelse
        </ul>
    </div>
</div>

{{-- <div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            Collapsible Group 1</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat.</div>
        </div>
    </div>
</div> --}}
  

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