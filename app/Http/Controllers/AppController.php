<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['anggotas'] = Anggota::paginate(4); //data_anggota untuk ditampilkan ke view
        return view('app', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'ranting_latihan' => 'required',
            'ikat_pinggang' => 'required',
            'jabatan' => 'required'
        ],
        ['required' => ':attribute harus diisi!']); //ini dari attribut name dari form

        Anggota::create([
            'nomor_induk' => $request->nomor_induk, 
            'nama' => $request->nama, 
            'tempat_lahir' => $request->tempat_lahir, 
            'tanggal_lahir' => $request->tanggal_lahir, 
            'jenis_kelamin' => $request->jenis_kelamin, 
            'alamat' => $request->alamat, 
            'ranting_latihan' => $request->ranting_latihan, 
            'ikat_pinggang' => $request->ikat_pinggang, 
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['anggotas'] = Anggota::find($id);
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['anggotas'] = Anggota::find($id);

        $request->validate([
            'nomor_induk' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'ranting_latihan' => 'required',
            'ikat_pinggang' => 'required',
            'jabatan' => 'required'
        ],
        ['required' => ':attribute harus diisi!']); //ini dari attribut name dari form

        $data['anggotas']->update($request->all());

        //dd(Anggota::find($id));
        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil dihapus!');
    }
}
