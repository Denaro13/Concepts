@auth
    <h4 class="text-white mb-2 text-xl"> Share your concepts </h4>
    <div class="row">
        <form action="{{ route('concepts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4 class="text-white"> Login to Share your concepts </h4>
@endguest
