 <div class="card">
     <div class="px-3 pt-4 pb-2">
         <div class="d-flex align-items-center justify-content-between">
             <div class="d-flex align-items-center">
                 <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $concept->user->getImageURL() }}"
                     alt="{{ $concept->user->name }}">
                 <div>
                     <h5 class="card-title mb-0"><a href="{{ route('users.show', $concept->user->id) }}">
                             {{ $concept->user->name }}
                         </a></h5>
                 </div>
             </div>
             <div>
                 <form action="{{ route('concepts.destroy', $concept->id) }}" method="POST">
                     @csrf
                     @method('delete')
                     @if (!Route::is('concepts.show'))
                         <a href="{{ route('concepts.show', $concept->id) }}">View</a>
                     @endif
                     @if (Auth::id() === $concept->user_id)
                         <a href="{{ route('concepts.edit', $concept->id) }}">Edit</a>
                         <button class="btn btn-danger btn-sm ms-2">x</button>
                     @endif
                 </form>
             </div>
         </div>
     </div>
     <div class="card-body">
         @if ($editing ?? false)
             <form action="{{ route('concepts.update', $concept->id) }}" method="post">
                 @csrf
                 @method('put')
                 <div class="mb-3">
                     <textarea name="content" class="form-control" id="content" rows="3"> {{ $concept->content }} </textarea>
                     @error('content')
                         <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                     @enderror
                 </div>
                 <div class="">
                     <button type="submit" class="btn btn-dark"> Update </button>
                 </div>
             </form>
         @else
             <p class="fs-6 fw-light text-muted">
                 {{ $concept->content }}
             </p>
         @endif
         <div class="d-flex justify-content-between">
             @include('concepts.shared.like-button')
             <div>
                 <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                     {{ $concept->created_at->diffForHumans() }} </span>
             </div>
         </div>
         @include('shared.comments-box')
     </div>
 </div>
