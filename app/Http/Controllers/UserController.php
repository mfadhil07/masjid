<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function home()
    {
        $masjid = DB::table('masjid')
        ->paginate(12);
        return view('user.home',[
            'title' => 'Home',
            'active' => 'home',
            'masjid' => $masjid
        ]);
    }

    public function maps()
    {
        $masjid = DB::table('masjid')
        ->paginate(4);
    if (request('search')) {
        $masjid = DB::table('masjid')
            ->where('nama', 'like', '%' . request('search') . '%')
            ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
            ->orWhere('desa', 'like', '%' . request('search') . '%')
            ->orWhere('alamat', 'like', '%' . request('search') . '%')
            ->paginate(10);
    }
    // dd($request);
    return view('user.maps',[
        'title' => 'Maps',
        'masjid' => $masjid,
        'active' => 'maps'
    ]);
    }

    public function jsonForSearch()
    {
        $data = Masjid::all();
        return response($data, 200);
    }

    public function json()
    {
        $features = Masjid::all();

        foreach ($features as $key => $value) {
            $features[$key] = [
                'type' => 'Feature',
                'properties' => [
                    'id' => $value['id'],
                    'name' => $value['nama'],
                    'kecamatan' => $value['kecamatan'],
                    'desa' => $value['desa'],
                    'alamat' => $value['alamat'],
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value['longitude'], $value['latitude']]
                ]
            ];
        }
        $response = [
            'type' => 'FeatureCollection',
            'features' => $features

        ];
        return response($response, 200);
    }

    public function detail_lokasi($id)
    {
        $masjid = Masjid::find($id);
        return response($masjid, 200);
    }

    public function Info()
    {
        $masjid = DB::table('masjid')
        ->paginate(4);
    if (request('search')) {
        $masjid = DB::table('masjid')
            ->where('nama', 'like', '%' . request('search') . '%')
            ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
            ->orWhere('desa', 'like', '%' . request('search') . '%')
            ->orWhere('alamat', 'like', '%' . request('search') . '%')
            ->paginate(10);
    }
        return view('user.info',[
            'title' => 'Info',
            'active' => 'info',
            'masjid' => $masjid
        ]);
    }

    public function About()
    {
        return view('user.about',[
            'title' => 'About',
            'active' => 'about'
        ]);
    }
    
}
