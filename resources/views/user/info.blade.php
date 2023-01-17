@extends('layouts.main')
@section('contents')

<form class="flex justify-end mt-4" action="/info">
    <div class="absolute border-2 rounded-btn mt-1 md:w-30 lg:w-1/4 mb-2">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input type="search" id="search" name="search"
            class="block p-4 pl-10 w-full items-end text-sm text-gray-100 bg-gray-300 rounded-lg border border-gray-900 focus:ring-green-500 focus:border-green-500 dark:bg-gray-100 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-green-500 dark:focus:border-green-500"
            placeholder="Search" required value="{{ request('search') }}">
        <button type="submit"
            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-green-800">Search</button>
    </div>
</form>
<div class="container my-24 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800 text-center">

        <h2 class="text-3xl font-bold mb-12 pb-4 text-center">Info Masjid dan Dayah di Kabupaten Bireuen</h2>

        <div class="grid lg:grid-cols-3 gap-6 xl:gap-x-12">
            @foreach($masjid as $item)
                <div class="mb-6 lg:mb-0">
                    <div class="relative block bg-white rounded-lg shadow-lg">
                        <div class="flex">
                            <div class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4"
                                data-mdb-ripple="true" data-mdb-ripple-color="light">
                                <img src="{{ asset('/storage/'. $item->image) }}"
                                    class="w-full" />
                            </div>
                        </div>
                        <div class="p-6">
                            <h5 class="font-bold text-lg mb-3">{{ $item->nama }}</h5>
                            <p class="text-gray-500">
                                <a href="" class="text-gray-900">{{ $item->desa }}, Kecamatan
                                    {{ $item->kecamatan }}</a></small>
                            </p>
                            <p class="mb-2 pb-2">
                                {{ $item->alamat }}
                            </p>
                            <button>
                                <a href="/detail/{{ $item->id }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Liat
                                    Detail
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Section: Design Block -->

</div>
<div class="my-8 mr-3 ml-3 ">
    {{ $masjid->links() }}
</div>

@endsection
