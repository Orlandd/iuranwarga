<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Http\Requests\StoreWargaRequest;
use App\Http\Requests\UpdateWargaRequest;
use App\Models\RukunTetangga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Warga::where('rukun_tetangga_id', 'LIKE', '%01%')->get());


        return view('dashboard.warga.index', [
            'wargas' => Warga::with('rts')->get(),
            'rts' => RukunTetangga::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.warga.create', [
            'rts' => RukunTetangga::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWargaRequest $request)
    {
        // dd($request);

        $validate = $request->validate([
            'nama' => ['required', 'string'],
            'nik' => ['required', 'integer', 'unique:wargas,nik'],
            'kk' => ['required', 'integer'],
            'gender' => ['required',],
            'agama' => ['required',],
            'tempatLahir' => ['required', 'string'],
            'tanggalLahir' => ['required',],
            'rukun_tetangga_id' => ['required'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        if (!File::exists(public_path('storage/warga'))) {
            File::makeDirectory(public_path('storage/warga'), 0775, true);
        }

        if ($request->hasFile('image')) {
            $imageName = $request->nama . '-' . $request->nik . '.' . $request->image->extension();
            $request->image->move(public_path('storage/warga'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }

        Warga::create([
            'nama' => $validate['nama'],
            'nik' => $validate['nik'],
            'kk' => $validate['kk'],
            'gender' => $validate['gender'],
            'agama' => $validate['agama'],
            'tempatLahir' => $validate['tempatLahir'],
            'tanggalLahir' => $validate['tanggalLahir'],
            'rukun_tetangga_id' => $validate['rukun_tetangga_id'],
            'image' => $imageName,
        ]);

        return redirect("/dashboard/wargas")->with("status", 'Data warga telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWargaRequest $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        //
    }

    public function rtFilter(Request $request)
    {
        if ($request->rt == 'all') {
            $wargas = Warga::with('rts')->get();
        } else {
            $wargas = Warga::with('rts')->where('rukun_tetangga_id', $request->rt)->get();
        }

        return response()->json($wargas);
    }
}
