
@extends("default")

@section('title', $category['name'])

<link rel="stylesheet" href="{{ asset("css/wiki_home.css")}}">
@section('content')
    <div class="wiki-categories">
        @foreach($pages as $page)
            <a href="/wiki/{{ $category['slug'] }}/{{ $page['slug'] }}">
                <div class="wiki-category-small">
                    <div class="wiki-text">
                        <h3 class="wiki-name">{{ $page['name'] }}</h3>
                    </div>
                </div>
            </a>
        @endforeach
        @if(sizeof($pages) == 0)
                <div class="wiki-category-small">
                    <div class="wiki-text">
                        <h3 class="wiki-name">Cette catégorie est vide</h3>
                    </div>
                </div>
        @endif
        <a href="/wiki">
            <div class="wiki-category-small">
                <div class="wiki-text">
                    <h3 class="wiki-name">Retour</h3>
                </div>
            </div>
        </a>
    </div>
@endsection
