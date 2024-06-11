<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Http\Requests\StoreTagihanRequest;
use App\Http\Requests\UpdateTagihanRequest;
use App\Models\RukunTetangga;
use App\Models\Warga;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tagihan.index', [
            'tagihans' => Tagihan::with('wargas.rts')->get(),
            'rts' => RukunTetangga::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tagihan.create', [
            'wargas' => Warga::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagihanRequest $request)
    {
        $validate = $request->validate([
            'warga_id' => ['required',],
            'nominal' => ['required', 'integer'],
            'deskripsi' => ['required'],
        ]);

        $validate['status'] = 'Belum';


        Tagihan::create($validate);

        return redirect("/dashboard/tagihans")->with("status", 'Tagihan baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagihanRequest $request, Tagihan $tagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        //
    }

    public function approve($id)
    {
        $tagihan = Tagihan::find($id);
        // dd($tagihan);

        $time = new DateTime();

        $tagihan->status = 'Sudah';
        $tagihan->tanggalBayar = $time->format('Y-m-d');
        $tagihan->save();


        return redirect("/dashboard/tagihans")->with("status", 'Tagihan telah dibayar!');
    }

    public function warga($id)
    {
        $time = new DateTime();

        $tagihan = Tagihan::with('wargas.rts')
            ->whereHas('wargas', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->whereMonth('created_at', $time->format('m'))
            ->whereYear('created_at', $time->format('Y'))
            ->get();



        return view('dashboard.tagihan.warga', [
            'tagihans' => $tagihan
        ]);
    }

    public function laporan()
    {
        return view('dashboard.tagihan.laporan', [
            'tagihans' => Tagihan::with('wargas.rts')->get()
        ]);
    }

    public function export()
    {
        $tagihans = Tagihan::with('wargas.rts')->get();
        $pdf = Pdf::loadView('pdf.export-pembayaran', ['tagihans' => $tagihans]);
        return $pdf->download('pembayaran.pdf');
    }

    public function filter(Request $request)
    {
        $id = $request->input('id');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $status = $request->input('status');

        $tagihan = Tagihan::with('wargas.rts')
            ->whereHas('wargas', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->where('status', $status)
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get();

        return response()->json($tagihan);
    }

    public function listFilter(Request $request)
    {
        $status = $request->input('status');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $rt = $request->input('rt');

        $tagihan = Tagihan::with('wargas.rts')
            ->whereHas('wargas.rts', function ($query) use ($rt) {
                $query->where('id', $rt);
            })
            ->where('status', $status)
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get();

        return response()->json($tagihan);
    }
}
