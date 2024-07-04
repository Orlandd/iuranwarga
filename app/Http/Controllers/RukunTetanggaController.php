<?php

namespace App\Http\Controllers;

use App\Models\RukunTetangga;
use App\Http\Requests\StoreRukunTetanggaRequest;
use App\Http\Requests\UpdateRukunTetanggaRequest;
use App\Models\Lingkungan;
use App\Models\Pengeluaran;
use App\Models\Warga;

class RukunTetanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(RukunTetangga::with('warga')->get());
        return view('dashboard.rt.index', [
            'rts' => RukunTetangga::with('warga')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rt.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRukunTetanggaRequest $request)
    {

        $validate = $request->validate([
            'nama' => ['required', 'unique:rukun_tetanggas,nama'],
        ]);


        RukunTetangga::create($validate);

        return redirect("/dashboard/rukun-tetanggas")->with("status", 'Data RT telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RukunTetangga $rukunTetangga)
    {
        // dd(Pengeluaran::whereHas('lingkungans.rts', function ($query) use ($rukunTetangga) {
        //     $query->where('id', $rukunTetangga->id);
        // })->with('lingkungans.rts')->get());
        return view('dashboard.rt.detail', [
            'rt' => RukunTetangga::with('warga')->find($rukunTetangga->id),
            'pengeluarans' => Pengeluaran::whereHas('lingkungans.rts', function ($query) use ($rukunTetangga) {
                $query->where('id', $rukunTetangga->id);
            })->with('lingkungans.rts')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RukunTetangga $rukunTetangga)
    {
        // dd(Warga::where('rukun_tetangga_id', $rukunTetangga->id)->get());

        return view('dashboard.rt.edit', [
            'rt' => RukunTetangga::find($rukunTetangga->id),
            'wargas' => Warga::where('rukun_tetangga_id', $rukunTetangga->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRukunTetanggaRequest $request, RukunTetangga $rukunTetangga)
    {

        // dd($request->nama !== $rukunTetangga->nama);

        $rule = [];


        if ($request->nama !== $rukunTetangga->nama) {
            $rule['nama'] = ['required', 'unique:rukun_tetanggas,nama'];
            $validatedData = $request->validate($rule);

            $rukunTetangga->nama = $request->nama;
        }

        $rukunTetangga->warga_id = $request->warga_id;
        $rukunTetangga->save();

        return redirect("/dashboard/rukun-tetanggas")->with("status", 'Data RT telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RukunTetangga $rukunTetangga){
        $rukunTetangga->delete();

        return redirect("/dashboard/rukun-tetanggas")->with("status", 'Data RT telah dihapus!');
    }
}
