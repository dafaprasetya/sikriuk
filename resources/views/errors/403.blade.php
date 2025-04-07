@extends('main.snippets.core')
@section('content')
@include('main.snippets.loadingscreen')
@include('main.snippets.navbar3')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>403</h1>
            <h2>AKSES DITOLAK</h2>
            <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>
@include('main.snippets.footer')
@endsection
