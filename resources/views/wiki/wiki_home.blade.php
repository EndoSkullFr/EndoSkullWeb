@extends("default")
@section('title', "Wiki")

<link rel="stylesheet" href="{{ asset("css/wiki_home.css")}}">
@section('content')
    <div class="wiki-categories">
        @foreach($categories as $category)
            <a href="/wiki/category/{{ $category['slug'] }}">
                <div class="wiki-category">
                    <img class="wiki-image" src="{{ $category['icon'] }}" alt="{{ $category['name'] }}">
                    <div class="wiki-text">
                        <h3 class="wiki-name">{{ $category['name'] }}</h3>
                        <p class="wiki-desc">{{ $category['description'] }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
