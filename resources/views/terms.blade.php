@extends('layout.layout')

@section('content')
    <div class="grid grid-cols-8 gap-8">
        <div class="col-span-2">
            @include('shared.left-sidebar')
        </div>
        <div class="col-span-4">
            <h1 class="font-bold text-3xl text-white text-center">Terms</h1>
            <div class="mt-4">
                <p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis sint tempore rerum
                    laudantium
                    et impedit quisquam
                    minima, hic odit omnis aliquid temporibus ab, tenetur culpa delectus veniam expedita, cum nisi?</p>
            </div>
        </div>
        <div class="col-span-2">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
