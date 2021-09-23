<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
       <h2 class="font-semibolt text-xl">
        {{__('상세보기')}}
       </h2>
       <button onclick=location.href="{{route('posts.index')}}" type="button" class="btn btn-info hover:bg-blue-700 font-bold text-white">
           목록보기
        </button>
    </div>
    </x-slot>

    <x-post-show :post="$post"/>
</x-app-layout>
