<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use App\Models\Lingkungan;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pengeluaran.index', [
            'pengeluarans' => Pengeluaran::with('lingkungans')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengeluaran.create', [
            'lingkungans' => Lingkungan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengeluaranRequest $request)
    {
        $validate = $request->validate([
            'nama' => ['required', 'string'],
            'nominal' => ['required', 'integer'],
            'deskripsi' => ['required', 'string'],
            'tanggal' => ['required',],
            'lingkungan_id' => ['required'],
        ]);


        Pengeluaran::create($validate);

        return redirect("/dashboard/lingkungans")->with("status", 'Kegiatan baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengeluaranRequest $request, Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
    }
}
