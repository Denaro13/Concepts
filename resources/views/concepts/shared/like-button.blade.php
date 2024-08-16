@auth
    <div>
        @if (Auth::user()->likesConcept($concept))
            <form action="{{ route('concepts.unlike', $concept->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $concept->likes()->count() }} </button>
            </form>
        @else
            <form action="{{ route('concepts.like', $concept->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $concept->likes()->count() }} </button>
            </form>
        @endif
    </div>
@endauth
@guest
    <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{ $concept->likes()->count() }} </a>
@endguest
