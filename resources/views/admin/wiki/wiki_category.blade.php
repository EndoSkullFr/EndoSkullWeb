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
                        <span class="block text-red-500">{{ $category }}</span>
                    @endforeach
                    <form action="{{ route('wiki-category-update', $category) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-label for="title" value="Nom" />
                        <x-input id="title" name="name" :value="$category->name" />

                        <x-label for="slug" value="Url" />
                        <x-input id="slug" name="slug" :value="$category->slug" />

                        <x-label for="icon" value="Icone" />
                        <x-input id="icon" name="icon" :value="$category->icon" />

                        <x-label for="content" value="Description" />
                        <textarea id="content" class="w-full" name="description">{{ $category->description }}</textarea>

                        <x-button style="display: block !important" class="mt-10">Modifier la catégorie</x-button>
                    </form>

                    <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('wiki-editor')">
                            {{ __('Retour') }}
                        </x-nav-link>
                    </div>
                    <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('wiki-page-create-editor', $category['slug'])">
                            {{ __('Ajouter') }}
                        </x-nav-link>
                    </div>
                    @foreach(\App\Models\WikiPage::where('category', $category->id)->get() as $page)
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('wiki-page-editor', [$page->slug])">
                                {{ __($page->name) }}
                            </x-nav-link>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
