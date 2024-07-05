<?php

namespace App\Http\Controllers;

use App\Models\Lingkungan;
use App\Models\Pengeluaran;
use App\Models\RukunTetangga;
use App\Models\Tagihan;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $id = 1; // Example id, replace it with your actual id

        // $lingkungans = Lingkungan::with('rts', 'pengeluarans')->where('rukun_tetangga_id', $id)->get();

        // $lingkungans->each(function ($lingkungan) {
        //     $totalPengeluaran = $lingkungan->pengeluarans->sum('nominal');
        //     $lingkungan->total_pengeluaran = $totalPengeluaran;
        // });

        // Optionally, you can convert the collection to JSON or manipulate further
        // dd($lingkungans);


        // $id = 1;


        // // Query to get the sum of 'nominal' grouped by month and year for the given RTS id
        // $pemasukan = Tagihan::with('wargas.rts')
        //     ->whereHas('wargas.rts', function ($query) use ($id) {
        //         $query->where('id', $id);
        //     })
        //     ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('SUM(nominal) as total_nominal'))
        //     ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        //     ->get();

        // dd($pemasukan);

        return view('dashboard.index', [
            'rts' => RukunTetangga::with('warga')->get(),
            'lingkungans' => Lingkungan::with('rts')->latest()->get(),
        ]);
    }

    public function pemasukan(Request $request)
    {
        $id = $request->rt;

        // Query to get the sum of 'nominal' grouped by month and year for the given RTS id
        $pemasukan = Tagihan::with('wargas.rts')
            ->when($id !== 'all', function ($query) use ($id) {
                // If 'rt' is not 'all', filter by the specific RT value
                $query->whereHas('wargas.rts', function ($subQuery) use ($id) {
                    $subQuery->where('id', $id);
                });
            })
            ->where('status', 'sudah')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(nominal) as total_nominal')
            )
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->get();

        return response()->json($pemasukan);
    }


    public function pengeluaran(Request $request)
    {
        $id = $request->rt;

        // Get Lingkungans based on the 'rt' parameter
        $lingkungans = Lingkungan::with('rts', 'pengeluarans')
            ->when($id !== 'all', function ($query) use ($id) {
                // If 'rt' is not 'all', filter by the specific RT value
                $query->whereHas('rts', function ($subQuery) use ($id) {
                    $subQuery->where('id', $id);
                });
            })
            ->get();

        // Calculate total pengeluaran for each lingkungan
        $lingkungans->each(function ($lingkungan) {
            $totalPengeluaran = $lingkungan->pengeluarans->sum('nominal');
            $lingkungan->total_pengeluaran = $totalPengeluaran;
        });

        return response()->json($lingkungans);
    }


    public function agama(Request $request)
    {
        $id = $request->rt;

        // Query to get the number of residents based on religion
        $jumlahPerAgama = Warga::when($id !== 'all', function ($query) use ($id) {
            // If 'rt' is not 'all', filter by the specific RT value
            $query->whereHas('rts', function ($subQuery) use ($id) {
                $subQuery->where('id', $id);
            });
        })
            ->select('agama', DB::raw('count(*) as jumlah'))
            ->groupBy('agama')
            ->get();

        return response()->json($jumlahPerAgama);
    }

    public function gender(Request $request)
    {
        $id = $request->rt;

        // Query to get the number of residents based on gender
        $gender = Warga::when($id !== 'all', function ($query) use ($id) {
            // If 'rt' is not 'all', filter by the specific RT value
            $query->whereHas('rts', function ($subQuery) use ($id) {
                $subQuery->where('id', $id);
            });
        })
            ->select('gender', DB::raw('count(*) as jumlah'))
            ->groupBy('gender')
            ->get();

        return response()->json($gender);
    }


    public function warga(Request $request)
    {
        $id = $request->rt;

        // Mengambil jumlah warga berdasarkan RT tertentu
        $jumlah = Warga::with('rts') // Load relasi 'rts' dari model 'Warga'
            ->select('rukun_tetangga_id', DB::raw('count(*) as jumlah')) // Memilih kolom 'nama' dari relasi 'rts' dan menghitung jumlah baris
            ->groupBy('rukun_tetangga_id') // Mengelompokkan berdasarkan 'nama' dari relasi 'rts'
            ->get(); // Mendapatkan hasil kueri

        return response()->json($jumlah);
    }
}
