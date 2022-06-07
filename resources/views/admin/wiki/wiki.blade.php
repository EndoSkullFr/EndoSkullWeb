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
                    @foreach(\App\Models\WikiCategory::all() as $category)
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('wiki-category-editor', $category->slug)">
                                {{ __($category->name) }}
                            </x-nav-link>
                        </div>
                    @endforeach
                    <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('admin')">
                            {{ __('Retour') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
