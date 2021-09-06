<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibolt text-xl">
           {{__('Posts')}}
       </h2>
    </x-slot>

<x-post-list :posts=$posts />
</x-app-layout>
