<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masjid = Masjid::all();

        return view('admin.a_home',[
            'title' => 'Home',
            'active' => 'a_home',
            'masjid' => $masjid
        ]);
    }

    public function a_maps()
    {
        $masjid = DB::table('masjid')
            ->paginate(4);
        if (request('search')) {
            $masjid = DB::table('masjid')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%')
                ->paginate(10);
        }
        return view('admin.a_maps',[
            'title' => 'Maps',
            'masjid' => $masjid,
            'active' => 'a_maps'
        ]);
    }

    public function a_info()
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
        return view('admin.a_info',[
            'title' => 'Info',
            'active' => 'a_info',
            'masjid' => $masjid
        ]);
    }
    public function a_about()
    {
        return view('admin.a_about',[
            'title' => 'About',
            'active' => 'a_about'
        ]);
    }
 
    public function json()
    {
        $features = Masjid::all();

        foreach ($features as $key => $value) {
            $features[$key] = [
                'type' => 'Feature',
                'properties' => [
                    'name' => $value['nama'],
                    'kecamatan' => $value['kecamatan'],
                    'desa' => $value['desa']
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
    public function detail($id)
    {
        $masjid = masjid::find($id);
        return view('admin.detail', [
            'title' => 'Detail Masjid dan Dayah',
            'active' => 'a_info',
            'masjid' => $masjid
        ]);
    }
}
