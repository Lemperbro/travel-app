@extends('layouts.main')

@section('container')

@if($data !== null)
<div class='mb-9 w-full mt-3 text-justify font-semibold'>
  {!! $data->terms !!}
</div>

@endif
    
@endsection