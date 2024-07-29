 <div class="border-1 rounded-md text-white p-2">
     <div class="p-2 pb-1">
         <h5 class="">Search</h5>
     </div>
     <div>
         <form action="{{ route('dashboard') }}" method="get">
             <input value="{{ request('search', '') }}" name='search' placeholder="..."
                 class="w-[15rem] p-2 text-black rounded-md" type="text">
             <button class="bg-red-400 py-2 px-3 rounded-md mt-2"> Search</button>
         </form>
     </div>
 </div>
