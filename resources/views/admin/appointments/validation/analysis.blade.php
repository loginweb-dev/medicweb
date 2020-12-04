<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Orden de laboratorio | {{ setting('site.title') }}</title>

    <style>
        .div-wather-mark{
            position: absolute;
            width: 100%;
            top: 50%;
            text-align: center;
            opacity: 0.1;
        }
        .small{
            font-size: 8px;
            margin-bottom: -5px
        }
    </style>
</head>
<body>
    @php
        $logo = setting('site.logo') ? url('storage/'.setting('site.logo')) : url('images/icons/icon-512x512.png');
    @endphp
    <div class="div-wather-mark">
        <img src="{{ $logo }}" width="50%" alt="wather-mark">
    </div>
    <div class="container" style="margin-top: 30px; margin-bottom: 100px">
        <table width="100%">
            <tr>
                <td width="50%">
                    <div style="width: 150px; text-align:center">
                        <img src="{{ $logo }}" alt="logo" width="50px"><br>
                        <b>{{ setting('site.title') }}</b><br>
                        <p class="small">{{ setting('site.telefonos') }} </p>
                        <p class="small"> {{ setting('site.direccion') }} </p>
                        <p class="small"> {{ setting('site.ciudad') }} </p>
                    </div>
                </td>
                <td width="50%">
                    <table width="100%" style="text-align: right">
                        <tr>
                            <td><b style="font-size: 15px">{{ $orden_analisis->specialist->full_name }}</b></td>
                        </tr>
                        <tr>
                            <td>
                                @php
                                    $especialidades = '';
                                    foreach($orden_analisis->specialist->specialities as $especialidad){
                                        $especialidades .= $especialidad->name." - ";
                                    }
                                @endphp
                                {{ substr($especialidades, 0, -2) }}
                            </td>
                        </tr>
                        <tr>
                            <td><small>{{ $orden_analisis->specialist->location }}</small></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2 class="text-center">Orden de laboratorio</h2>
            </div>
        </div>

        <br>
        @php
            setlocale(LC_ALL,"es_ES");
        @endphp
        <div class="row">
            <div class="col-md-6">
                <b>Paciente : </b> {{ $orden_analisis->customer->name }} {{ $orden_analisis->customer->last_name }}
            </div>
            <div class="col-md-6">
                <b>Fecha de emisión : </b> {{ strftime("%d de %B, %Y",  strtotime($orden_analisis->created_at)) }}
            </div>
        </div>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #7CCBF5">
                        <th>N&deg;</th>
                        <th>Tipo</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                        $tipo_analisis = \App\AnalysisType::where('deleted_at', NULL)->get();
                    @endphp
                    @foreach ($tipo_analisis as $item)
                        @php
                            $detalle_analisis = '';
                        @endphp
                        @foreach ($orden_analisis->details as $detail)
                            @php
                                $analsis = \App\Analysi::findOrFail($detail->analysi_id);
                                if($analsis->analysis_type_id == $item->id){
                                    $detalle_analisis .= $analsis->name.'<br>';
                                }
                            @endphp
                        @endforeach
                        @if (!empty($detalle_analisis))
                            <tr>
                                <td>{{ $cont }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{!! $detalle_analisis !!}</td>
                            </tr>
                            @php
                                $cont++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>