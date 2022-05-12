@extends("default")
@section('title', "EndoSkull")

<link rel="stylesheet" href="{{asset("css/error.css")}}">
@section('content')
    <div class="error">
        <h2>Erreur 404</h2>
        <p>La page que vous cherchez n'existe pas</p>
    </div>
@endsection
