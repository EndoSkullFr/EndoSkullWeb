@extends("default")
@section('title', "EndoSkull")

<link rel="stylesheet" href="{{asset("css/error.css")}}">
@section('content')
    <div class="error">
        <h2>Erreur 401</h2>
        <p>Vous n'etes pas authentifier</p>
    </div>
@endsection
