<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($errors->all() as $error)
                        <span class="block text-red-500">{{ $page }}</span>
                    @endforeach
                    <form action="{{ route('wiki-page-update', [$page]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-label for="title" value="Nom" />
                        <x-input id="title" name="name" :value="$page->name" />

                        <x-label for="slug" value="Url" />
                        <x-input id="slug" name="slug" :value="$page->slug" />

                        <x-label for="content" value="Description" />
                        <textarea id="content" class="w-full" name="description">{{ $page->content }}</textarea>

                        <x-label for="category" value="Categorie" />

                        <select name="category" id="category">
                            @foreach (\App\Models\WikiCategory::all() as $category)
                                <option value="{{ $category->id }}" {{ $page->category == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <x-button style="display: block !important" class="mt-10">Modifier la page</x-button>
                    </form>
                        <form action="{{ route('wiki-page-remove', [$page]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-button style="display: block !important" class="mt-10">Supprimer la page</x-button>
                        </form>

                    <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('wiki-category-editor', App\Models\WikiCategory::where('id', $page->category)->get()[0]['slug'])">
                            {{ __('Retour') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
