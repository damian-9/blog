<x-app-layout :meta-title="'Editing: '.$post->title" :meta-description="$post->body">

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit post') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-4 max-w-xl">
                        @include('posts.form-fields')
                        @csrf
                        @method('PATCH') {{--Agregar el metodo PATCH para que lo soporte el navegador--}}
                        <x-primary-button type="submit">{{__('Save')}}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>