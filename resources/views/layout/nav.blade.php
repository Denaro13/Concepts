 <nav class="bg-red-400 text-white py-3 fixed top-0 right-0 left-0 z-50" data-bs-theme="dark">
     <div class="container flex justify-between items-center">
         <a class="navbar-brand fw-light text-3xl" href="/"><span class="fas fa-brain me-1">
             </span>{{ config('app.name') }}</a>
         {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button> --}}
         <div class="">
             <ul class="text-xl flex gap-4 ">
                 @guest
                     <li class="">
                         <a class="{{ Route::is('login') ? 'text-red-700' : 'text-white' }}  " aria-current="page"
                             href="{{ route('login') }}">Login</a>
                     </li>
                     <li class="">
                         <a class="{{ Route::is('register') ? 'text-red-700' : 'text-white' }} "
                             href="{{ route('register') }}">Register</a>
                     </li>
                 @endguest
                 @auth
                     <li class="text-2xl">
                         <a class="nav-link" href="{{ route('profile') }}">{{ Auth::user()->name }} </a>
                     </li>
                     <li class="text-2xl">
                         <form action="{{ route('logout') }}" method="post">
                             @csrf
                             <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                         </form>
                     </li>
                 @endauth
             </ul>
         </div>
     </div>
 </nav>
 {{-- navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary --}}
