<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de laboratorio | {{ setting('site.title') }}</title>

    <style>
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }
        .div-logo{
            position: fixed;
            top: 20px;
            left: 20px;
            text-align: center
        }
        .div-wather-mark{
            position: fixed;
            width: 100%;
            top: 30%;
            text-align: center;
            z-index: -1;
            opacity: 0.2;
        }
        .small{
            font-size: 8px;
            margin-bottom: -5px
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="35%">
                <div style="width: 150px; text-align:center">
                    @php
                        $logo = setting('site.logo') ? url('storage/'.setting('site.logo')) : url('images/icons/icon-512x512.png');
                    @endphp
                    <img src="{{ $logo }}" alt="logo" width="50px"><br>
                    <b>{{ setting('site.title') }}</b><br>
                    <p class="small">{{ setting('site.telefonos') }} </p>
                    <p class="small"> {{ setting('site.direccion') }} </p>
                    <p class="small"> {{ setting('site.ciudad') }} </p>
                </div>
            </td>
            <td width="30%" style="text-align: center">
                <h3>Orden de laboratorio</h3>
            </td>
            <td width="35%">
                <table width="100%" style="text-align: right">
                    <tr>
                        <td><b style="font-size: 18px">{{ $orden_analisis->specialist->prefix }} {{ $orden_analisis->specialist->name }} {{ $orden_analisis->specialist->last_name }}</b></td>
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
                        <td>{{ $orden_analisis->specialist->location }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="div-wather-mark">
        <img src="{{ $logo }}" width="40%" alt="wather-mark">
    </div>

    <br>
    <table width="100%" style="margin-top:20px">
        <tr>
            <td><b>Nombre : </b></td>
            <td>{{ $orden_analisis->customer->name }} {{ $orden_analisis->customer->last_name }}</td>
            <td><b>Fecha : </b></td>
            <td>{{ strftime("%d de %B, %Y",  strtotime($orden_analisis->created_at)) }}</td>
        </tr>
    </table>
    <br><br>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr style="background-color: #7CCBF5">
                <th style="width:50px; font-size: 20px">N&deg;</th>
                <th style="font-size: 20px">Tipo</th>
                <th style="font-size: 20px">Detalle</th>
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
    <div style="margin-top: 200px; text-align:center; width:100%">
        <small>-------------------------------------</small><br>
        <b>Firma</b>
    </div>
</body>
</html>