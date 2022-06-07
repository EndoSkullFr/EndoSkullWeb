
@extends("default")

@section('title', $page['name'])

<link rel="stylesheet" href="{{ asset("css/wiki_page.css")}}">
@section('content')

    <div class="wiki-page">
        <h3 class="wiki-page-title">{{ $page['name'] }}</h3>
        @foreach(explode("\n", $page['content']) as $line)
            @if(str_starts_with($line, 'img:'))
                <img src="{{ substr($line, 4) }}" width="50%" alt="Une image">
            @else
                <p class="wiki-page-line">{{ $line }}</p>
            @endif
        @endforeach
        <a href="/wiki/category/{{ \App\Models\WikiCategory::where('id', $page->category)->get()[0]['slug'] }}">
            <div class="wiki-back">
                <div class="wiki-text">
                    <h3 class="wiki-name">Retour</h3>
                </div>
            </div>
        </a>
    </div>
@endsection
