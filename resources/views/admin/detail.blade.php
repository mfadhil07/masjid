@extends('layouts.main')
@section('contents')
<div class="px-4 py-6 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-4 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <h3
            class="max-w-lg mb-6 font-sans text-2xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
            <span class="relative inline-block">
            </span>
           {{ $masjid->nama }}
        </h3>
    </div>
   
    <div class="grid max-w-screen-lg gap-8 lg:grid-cols-2 sm:mx-auto">
          {{-- menampilkan image --}}
          <div class="grid grid-cols-2 gap-5 ">
            <img class="object-cover w-full h-56 col-span-2 rounded shadow-lg" src="{{ asset('/storage/'. $masjid->image) }}"
                alt="" />
            {{-- @foreach ($masjid->image as $daf)
                <img class="object-cover w-full h-48 rounded shadow-lg" src="{{ asset('/storage/'. $daf) }}" alt="" />
            @endforeach --}}
        </div>
        <div class="flex flex-col justify-center">
            <div class="flex">
                <div class="ml-6 text-base">                   
                    <p class="text-base text-gray-700 md:text-lg font-semibold">
                        {{ $masjid->desa }} , Kec. {{ $masjid->kecamatan }}
                      </p>
                    <hr class="w-full my-2 border-gray-300" />
                    <h6 class="mb-2 leading-5">
                        <span class="font-semibold"> Alamat Lengkap : </span>
                            {{ $masjid->alamat }}
                    </h6>
                    <hr class="w-full my-2 border-gray-300" />
                    <h6 class="mb-2 text-base leading-5">
                       <span class="font-semibold"> No Handphone : </span>
                            {{ $masjid->no_hp }} 
                    </h6>
                    <hr class="w-full my-2 border-gray-300" />
                </div>
            </div>
            <div class="flex">
                <div class="ml-6 text-lg">
                    <h6 class="mb-2 text-base leading-5 font-semibold">Deskripsi :</h6>
                    <p class="text-base ">
                        {{ $masjid->deskripsi }}
                    </p>
                    <hr class="w-full my-6 border-gray-300" />
                </div>
            </div>
        </div>
       
    </div>
@endsection