@extends("default")
@section('title', "EndoSkull")

<link rel="stylesheet" href="{{asset("css/error.css")}}">
@section('content')
    <div class="error">
        <h2>Erreur 500</h2>
        <p>Une erreur s'est produite</p>
    </div>
@endsection
