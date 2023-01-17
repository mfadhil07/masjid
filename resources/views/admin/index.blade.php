@extends('layouts.main')
@section('contents')
<h1 class="text-2xl mt-4 ml-4 font-semibold"> Daftar Masjid atau Dayah Kabupaten Bireuen</h1>
    <div class="flex justify-end mt-6 mr-80">
        <div class="flex items-end mt-3">
            <a href="/masjid/create">
                <button class="h-11 w-20 text-lg text-white rounded-lg bg-green-900 hover:bg-green-600" type="submit">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 items-center mt-1 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            <span>Data</span>
                        </svg>
                    </div>
                </button>
            </a>
        </div>
        <div class="flex justify-end ml-2 mr-10">
            <form action="/masjid">
                <div class="absolute border-2 rounded-btn mt-1 md:w-30 lg:w-1/4">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="search" name="search"
                        class="block p-4 pl-10 w-full  text-sm text-black bg-gray-400 rounded-lg border border-gray-100 focus:ring-green-500 focus:border-green-500 dark:bg-gray-100 dark:border-gray-100 dark:placeholder-gray-600 dark:text-black dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Search" required value="{{ request('search') }}">
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-[#38bdf8] hover:bg-[#38bdf8] focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-[#38bdf8] dark:hover:bg-[#155e75] dark:focus:ring-green-800">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if (session()->has('pesan'))
    <div class="flex items-left w-full max-w-sm ml-8 overflow-hidden bg-gray-600 rounded-lg shadow-md dark:bg-gray-600">
        <div class="flex items-center justify-center w-12 bg-green-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
            </svg>
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-green-500 dark:text-green-400">{{ session('pesan') }}</span>
                <p class="text-sm text-gray-600 dark:text-gray-200"></p>
            </div>
        </div>
    </div>
@endif
    
<!-- ====== Table Section Start -->
<section class="py-2 lg:py-[20px]">
    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
              <thead>
                <tr class="bg-[#0369a1] text-center">
                  <th
                    class="w-1/6 min-w-[160px] border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                  >
                    Nama Masjid atau Dayah
                  </th>
                  <th
                    class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                  >
                    Desa
                  </th>
                  <th
                    class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                  >
                    Kecamatan
                  </th>
                  <th
                    class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                  >
                    No Handphone
                  </th>
                  <th
                    class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
                  >
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($masjid as $item)
                <tr>
                  <td
                    class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium"
                  >
                  {{ $item['nama'] }}
                  </td>
                  <td
                    class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium"
                  >
                  {{ $item['desa'] }}
                  </td>
                  <td
                    class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium"
                  >
                  {{ $item['kecamatan'] }}
                  </td>
                  <td
                    class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium"
                  >
                  {{ $item['no_hp'] }}
                  </td>
                  <td
                    class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium"
                  >
                  <div class="flex justify-center">
                    <a href="/detail/{{ $item->id }}" class="mx-2" title="Lihat"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg></a>
                    <a href="/masjid/{{ $item->id }}/edit" class="mx-2" title="Edit"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <div class="flex justify-center">
                        <form action="/masjid/{{ $item->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn-sm mr-2 pb-2" type="submit"
                                onclick="return confirm('Apakah Anda yakin Menghapus data ini ?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Table Section End -->
  
        <div class="mt-10 mb-10 ml-6 pr-6">
            {{ $masjid->links() }}
        </div>
    </div>
   
@endsection