{{-- @extends('layouts.app') --}}

<x-guest-layout>
    <x-slot name="header">
{{-- @section('content') --}}
    <h2 class="font"-semibold>{{__('home')}}</h2>
{{-- @endsection --}}
    </x-slot>
    <x-post-list :posts="$posts" />
</x-guest-layout>



