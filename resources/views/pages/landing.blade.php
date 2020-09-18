@extends('layouts.lp.master')

@section('header')
  @include('layouts.lp.header')
@endsection

@section('main')
  @foreach ($blocks as $item)
    @switch($item->type)
      @case('dinamyc-data')
        
          @include('blocks.'.$item->name, ['item'=>$item,'data' => json_decode($item->details)])
          @break
      @case('controller')
        @php
          $aux = json_decode($item->details);
          $myname = explode('.', $item->name);        
          $myname = $myname[1];
          $aux = $aux->$myname;
          $data = $aux->value;
          $data = explode('::', $data);
          $data = str_replace('()','',$data);
          $name_espace = $data[0];
          $function = $data[1];
        @endphp
        @include('blocks.'.$item->name, ['data' => $name_espace::$function(), 'block' => json_decode($item->details)])
        @break
    @endswitch
  @endforeach
@endsection

@section('footer')
  @include('layouts.lp.footer')
@endsection
