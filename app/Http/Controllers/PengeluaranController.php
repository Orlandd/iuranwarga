<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pengeluaran;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use App\Models\Lingkungan;
use App\Exports\PengeluaranExport;

class PengeluaranController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dashboard.pengeluaran.index', [
        //     'pengeluarans' => Pengeluaran::with('lingkungans')->get()
        // ]);

        // Fetch all pengeluarans from all lingkungans
        $pengeluarans = Pengeluaran::with('lingkungans')->get();

        // Sum pengeluaran nominal by lingkungan
        $groupedPengeluarans = $pengeluarans->groupBy('lingkungan_id')->map(function ($row) {
            return $row->sum('nominal');
        });

        // Get 10 lingkungans
        $latestLingkungans = Lingkungan::orderBy('tanggal', 'desc')->take(10)->get();

        // For chart
        $chartData = $latestLingkungans->map(function ($lingkungan) use ($groupedPengeluarans) {
            return [
                'nama' => $lingkungan->nama,
                'total' => $groupedPengeluarans[$lingkungan->id] ?? 0,
            ];
        });

        while (count($chartData) < 10) {
            $chartData->push(['nama' => '', 'total' => 0]);
        }

        return view('dashboard.pengeluaran.index', [
            'pengeluarans' => $pengeluarans,
            'chartData' => $chartData
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

        return redirect("/dashboard/pengeluarans")->with("status", 'Kegiatan baru telah ditambahkan!');
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
        return view('dashboard.pengeluaran.update', [
            'pengeluaran' => $pengeluaran,
            'lingkungans' => Lingkungan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengeluaranRequest $request, Pengeluaran $pengeluaran)
    {
        $validate = $request->validate([
            'nama' => ['required', 'string'],
            'nominal' => ['required', 'integer'],
            'deskripsi' => ['required', 'string'],
            'tanggal' => ['required',],
            'lingkungan_id' => ['required'],
        ]);

        $pengeluaran->update($validate);

        return redirect("/dashboard/pengeluarans")->with("status", 'Kegiatan telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect("/dashboard/pengeluarans")->with("status", 'Kegiatan telah dihapus!');
    }

    public function exportPDF()
    {
        $pengeluarans = Pengeluaran::with('lingkungans')->get();
        $pdf = PDF::loadView('pdf.export-pengeluaran', ['pengeluarans' => $pengeluarans]);
        return $pdf->download('pengeluaran.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PengeluaranExport, 'pengeluaran.xlsx');
    }
}
