@extends('layouts.main')

@section('container')
@foreach ($data as $data)
<h1 class="mb-32">{{ $data->kota->nama_kota }}</h1>

<a  class="mb-32">
    <h1>{{ $data->nama_wisata }}</h1>
</a>
@endforeach

@endsection                                                                                                                                                                                                                                         