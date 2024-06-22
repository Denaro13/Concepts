@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <div class="mt-3">
                @include('shared.user-card')
            </div>
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
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
