  <div class="d-flex justify-content-start">
      <p class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1 text-red-400">
          </span>{{ $user->followers()->count() }} </p>
      <p class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1 text-red-300">
          </span>{{ $user->concepts()->count() }} </p>
      <p class="fw-light nav-link fs-6 me-3 "> <span class="fas fa-comment me-1 text-red-400">
          </span>{{ $user->comments()->count() }} </p>
      <p class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1 text-red-400">
          </span>{{ $user->likes()->count() }} </p>
  </div>
