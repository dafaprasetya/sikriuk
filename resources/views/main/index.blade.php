@extends('main.snippets.core')

@section('content')
@include('main.snippets.loadingscreen')
@include('main.snippets.navbar')
@if ($promo->count() >= 1)
@include('main.snippets.promo')
@endif
@include('main.snippets.tetangperusahaan')
@include('main.snippets.jargon')
@include('main.snippets.menu')
@include('main.snippets.kemitraanshow')
@include('main.snippets.faq')
@include('main.snippets.stepbystep')
@include('main.snippets.formmitra')
@if ($testimoni->count() >= 1)
@include('main.snippets.testimoni')
@endif
@if ($blog->count() >= 1)
@include('main.snippets.blogshow')
@endif
@include('main.snippets.footer')
@endsection
