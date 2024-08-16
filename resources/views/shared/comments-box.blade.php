 <div>
     <form action="{{ route('concepts.comments.store', $concept->id) }}" method="post">
         @csrf
         <div class="mb-3">
             <textarea name='content' class="fs-6 form-control" rows="1"></textarea>
         </div>
         <div>
             <button type="submit " class="bg-black rounded-md p-2 text-white mb-2 text-sm"> Post Comment </button>
         </div>
     </form>
     <hr>
     @foreach ($concept->comments as $comment)
         <div class="d-flex align-items-start">
             <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                 alt="{{ $comment->user->name }}">
             <div class="w-100">
                 <div class="d-flex justify-content-between">
                     <h6 class="">{{ $comment->user->name }}
                     </h6>
                     <small class="fs-6 fw-light text-muted"> {{ $comment->created_at }} </small>
                 </div>
                 <p class="fs-6 mt-3 fw-light">
                     {{ $comment->content }}
                 </p>
             </div>
         </div>
         <hr>
     @endforeach
 </div>
