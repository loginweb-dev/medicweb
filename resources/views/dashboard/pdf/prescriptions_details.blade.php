<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receta médica | {{ setting('site.title') }}</title>

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
            opacity: 0.1;
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
            <td width="50%">
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
            <td width="50%">
                <table width="100%" style="text-align: right">
                    <tr>
                        <td><b style="font-size: 18px">{{ $receta->specialist->prefix }} {{ $receta->specialist->name }} {{ $receta->specialist->last_name }}</b></td>
                    </tr>
                    <tr>
                        <td>
                            @php
                                $especialidades = '';
                                foreach($receta->specialist->specialities as $especialidad){
                                    $especialidades .= $especialidad->name." - ";
                                }
                            @endphp
                            {{ substr($especialidades, 0, -2) }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $receta->specialist->location }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div style="text-align: center">
        <h2>Receta</h2>
    </div>

    <div class="div-wather-mark">
        <img src="{{ $logo }}" width="60%" alt="wather-mark">
    </div>

    <table width="100%" style="margin-top:20px">
        <tr>
            <td><b>Paciente : </b></td>
            <td>{{ $receta->customer->name }} {{ $receta->customer->last_name }}</td>
            <td><b>Fecha de emisión : </b></td>
            <td>{{ strftime("%d de %B, %Y",  strtotime($receta->created_at)) }}</td>
        </tr>
    </table>
    <br><br>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr style="background-color: #7CCBF5">
                <th style="width:50px; font-size: 20px">N&deg;</th>
                <th style="font-size: 20px">Cant.</th>
                <th style="font-size: 20px">Medicamento</th>
                <th style="font-size: 20px">Indicaciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($receta->details as $detail)
            <tr>
                <td>{{ $cont }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->medicine_name }}</td>
                <td>{{ $detail->medicine_description }}</td>
            </tr>
            @php
                $cont++;
            @endphp
            @endforeach
        </tbody>
    </table>
    <div style="position: fixed; bottom: 150px; left: 600px">
        @php
            $qr = base64_encode(QrCode::size(120)->generate(url('/prescription/validate/'.$receta->id)));
        @endphp
        <img src="data:image/png;base64, {!! $qr !!}">
    </div>
</body>
</html>