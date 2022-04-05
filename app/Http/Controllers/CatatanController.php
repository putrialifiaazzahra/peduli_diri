<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $catatan = Catatan::where('id_user', Auth::id())->get();
        return view('catatan.index', compact('catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catatan.create');
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
            'tanggal'   => 'required',
            'waktu'     => 'required',
            'lokasi'    => 'required',
            'suhu'      => 'required'
        ]);

        // dd(Auth::user()->nik);


        $catatan = Catatan::create([
            'id_user'   => Auth::id(),
            'tanggal'   => $request->tanggal,
            'waktu'     => $request->waktu,
            'lokasi'    => $request->lokasi,
            'suhu'      => $request->suhu
        ]);

        if($catatan){
            //redirect dengan pesan sukses
            return redirect()->route('catatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('catatan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
     * @param  int $id
     * @return \Illuminate\Http\Response;
     */
    public function edit($id)
    {
        $catatan = Catatan::findOrFail($id);
        return view('catatan.edit', compact('catatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  mixed $request
     * @param  mixed $catatan
     * @return void
     */
    public function update(Request $request, Catatan $catatan)
    {
        $this->validate($request, [
            'tanggal'   => 'required',
            'waktu'     => 'required',
            'lokasi'    => 'required',
            'suhu'      => 'required'
        ]);

        //get data siswa by ID
        $catatan = Catatan::findOrFail($catatan->id);

        if($request->file('tanggal') == "") {

            $catatan->update([
                'tanggal'   => $request->tanggal,
                'waktu'     => $request->waktu,
                'lokasi'    => $request->lokasi,
                'suhu'      => $request->suhu
            ]);

        } else {

            $catatan->update([
                'tanggal'   => $request->tanggal,
                'waktu'     => $request->waktu,
                'lokasi'    => $request->lokasi,
                'suhu'      => $request->suhu
            ]);

        }

        if($catatan){
            //redirect dengan pesan sukses
            return redirect()->route('catatan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('catatan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();

        if($catatan){
            //redirect dengan pesan sukses
            return redirect()->route('catatan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('catatan.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
