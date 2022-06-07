@extends("default")
@section('title', "EndoSkull")

<link rel="stylesheet" href="{{asset("css/error.css")}}">
@section('content')
    <div class="error">
        <h2>Erreur 403</h2>
        <p>Vous n'avez pas la permission</p>
    </div>
@endsection
