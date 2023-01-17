<div class="w-full h-16 text-black bg-[#0ea5e9] dark-mode:text-gray-200 dark-mode:bg-gray-800 fixed absolute z-20">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      @auth
          @if (auth()->user()->role == 1)
          <div class="p-4 flex flex-row items-center justify-between">
            <a href="/a_home" class="text-2xl font-bold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">WEBGIS</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'a_home' ? 'active: bg-white' : ' ' }}" href="/a_home"> <span class="link-underline link-underline-black text-black">Home</span> </a>
            <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'a_maps' ? 'active: bg-white' : ' ' }}" href="/a_maps"> <span class="link-underline link-underline-black text-black">Maps</span> </a>
            <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'a_info' ? 'active: bg-white' : ' ' }}" href="/a_info"> <span class="link-underline link-underline-black text-black">Info Masjid</span></a>
            <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'a_about' ? 'active: bg-white' : ' ' }}" href="/a_about"> <span class="link-underline link-underline-black text-black">About</span></a>
            <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'add_data' ? 'active: bg-white' : ' ' }}" href="/masjid"> <span class="link-underline link-underline-black text-black">Add Data</span></a>
            {{-- <a class="px-3 py-2 mt-2 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white sm:hover:scale-125 duration-300 dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-3 {{ $active === 'contact' ? 'active: underline decoration-white decoration-2' : ' ' }} " href="/contact"> <span class="link-underline link-underline-black text-black">Contact</span> </a> --}}
            <div class="relative inline-block text-left">
              <div class="flex flex-wrap">
                <div class="w-full sm:w-6/12 md:w-4/12 px-2">
                  <div class="relative inline-flex align-middle w-full">
                    <button class="px-2 py-1 focus:outline-none  ease-linear transition-all duration-150" type="button" onclick="openDropdown(event,'dropdown-id')">
                        <div>
                          <div class="w-8 h-8 overflow-hidden border-2 border-white rounded-full">
                          <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                      </div>
                        </div>
                    </button>
                    <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1" style="min-width:12rem" id="dropdown-id">
                      <a href="/logout" class="text-sm py-2 px-4 font-normal block w-full hover:bg-green-500 whitespace-nowrap bg-transparent text-slate-700">
                        Logout
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
          @endif
          @else
          <div class="p-4 flex flex-row items-center justify-between">
            <a href="/" class="text-2xl font-bold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">WEBGIS</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'home' ? 'active: bg-white' : ' ' }}" href="/"> <span class="link-underline link-underline-black text-black">Home</span> </a>
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'maps' ? 'active: bg-white' : ' ' }}" href="/maps"> <span class="link-underline link-underline-black text-black">Maps</span> </a>
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'info' ? 'active: bg-white' : ' ' }}" href="/info"> <span class="link-underline link-underline-black text-black">Info Masjid</span></a>
        <a class="px-4 py-2 mt-3 text-2sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 hover:scale-125 duration-300 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-2 {{ $active === 'about' ? 'active: bg-white' : ' ' }}" href="/about"> <span class="link-underline link-underline-black text-black">About</span></a>
     
      </nav>
      @endauth
    </div>
</div>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script>
  function openDropdown(event,dropdownID){
    let element = event.target;
    while(element.nodeName !== "BUTTON"){
      element = element.parentNode;
    }
    var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
      placement: 'bottom-start'
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
  }
</script>