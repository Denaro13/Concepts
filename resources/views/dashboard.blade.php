@extends('layout.layout')
@section('content')
    <div class="grid grid-cols-8 gap-8">
        <div class="col-span-2">
            @include('shared.left-sidebar')
        </div>
        <div class="col-span-4">
            @include('shared.success-message')
            @include('shared.submit-concept')
            <hr>
            {{-- @foreach ($concepts as $concept)
                <div class="mt-3">
                    @include('shared.concept-card')
                </div>
            @endforeach --}}
            @forelse ($concepts as $concept)
                <div class="mt-3">
                    @include('shared.concept-card')
                </div>
            @empty
                <p class="mt-3 text-center">No results found</p>
            @endforelse
            <div class="mt-3">
                {{ $concepts->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-span-2">
            @include('shared.search-bar')
            @include('shared.follow-box')

        </div>
    </div>
@endsection
