<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
       <h2 class="font-semibolt text-xl">
        {{__('Posts')}}
       </h2>
       <button onclick=location.href="{{route('posts.create')}}" type="button" class="btn btn-info hover:bg-blue-700 font-bold text-white">
           글쓰기
        </button>
    </div>
    </x-slot>

<x-post-list :posts=$posts />
</x-app-layout>
