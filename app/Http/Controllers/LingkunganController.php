<?php

namespace App\Http\Controllers;

use App\Models\Lingkungan;
use App\Http\Requests\StoreLingkunganRequest;
use App\Http\Requests\UpdateLingkunganRequest;
use App\Models\RukunTetangga;

class LingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.lingkungan.index', [
            'lingkungans' => Lingkungan::with('rts')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.lingkungan.create', [
            'rts' => RukunTetangga::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLingkunganRequest $request)
    {
        $validate = $request->validate([
            'nama' => ['required', 'string'],
            'tanggal' => ['required'],
            'rukun_tetangga_id' => ['required'],
        ]);


        Lingkungan::create($validate);

        return redirect("/dashboard/lingkungans")->with("status", 'Kegiatan baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLingkunganRequest $request, Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lingkungan $lingkungan)
    {
        //
    }
}
