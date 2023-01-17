<?php

namespace App\Http\Controllers;

use App\Models\masjid;
use Illuminate\Http\Request;
use Masjid as GlobalMasjid;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masjid = Masjid::latest();
        if (request('search')) {
            $masjid->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('alamat', 'like', '%' . request('search') . '%');
        }
        return view('admin.index',[
            'title' => 'Tambah Data',
            'active' => 'add_data',
            'masjid' => $masjid->paginate(15),
        ]);
    }

    public function create()
    {
        $masjid = new masjid;
        return view('admin.add_data',[
            'title' => 'Tambah Data',
            'active' => 'add_data', compact('masjid')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
        ]);
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('/thumbnail', $file_name);

        Masjid::create([
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $image,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/masjid')->with('pesan', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    public function edit($id)
    {
        $masjid = Masjid::find($id);
        $arr = [];
        $masjid['fasilitas'] = $arr;
        return view('admin.edit',[
            'title' => 'Edit Data',
            'active' => 'add_data',
            'masjid' => $masjid 
        ]);
        // dd($masjid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
        ]);
        $masjid = Masjid::find($id);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);
            $file_name = $request->image->getClientOriginalName();
            $image = $request->image->storeAs('thumbnail', $file_name);
            $masjid->image = $image;
        }

        $masjid->nama = $request->nama;
        $masjid->kecamatan = $request->kecamatan;
        $masjid->desa = $request->desa;
        $masjid->alamat = $request->alamat;
        $masjid->no_hp = $request->no_hp;
        $masjid->latitude = $request->latitude;
        $masjid->longitude = $request->longitude;
        $masjid->deskripsi = $request->deskripsi;
        $masjid->save();

        return redirect('/masjid')->with('pesan', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masjid = Masjid::find($id);
        $masjid->delete();
        return redirect('/masjid')->with('pesan', 'Data Berhasil di Hapus');
    }
}
