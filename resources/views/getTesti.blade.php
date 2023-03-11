@extends('layouts.main')


@section('container')

<form action="/comment/{{ $doc_no }}" method="post">
@csrf

<textarea name="testi" id="" cols="30" rows="10">

</textarea>

<button type="submit">kirim</button>
</form>

@endsection