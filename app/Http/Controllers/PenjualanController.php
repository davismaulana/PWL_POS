<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\UserModel;
use App\Models\StokModel;
use App\Models\PenjualanDetailModel;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Order',
            'list' => ['Home', 'Item']
        ];

        $page = (object) [
            'title' => 'Daftar Penjualan'
        ];

        $activeMenu = 'penjualan';

        $penjualan = PenjualanModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan,'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) {
        $penjualan =PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')->with('user');

        if ($request->user_id) {
            $penjualan->where('user_id', $request->user_id);
        }
    
        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('action', function ($penjualan) {
                $btn = '<a href="'.url('/penjualan/' . $penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah Penjualan']
        ];

        $page = (object) [
            'title' => 'Tambah data penjualan'
        ];

        $activeMenu = 'penjualan';

        $barang = BarangModel::whereHas('stok', function ($query) {
            $query->where('stok_jumlah', '>', 0);
        })->get();
        $user = UserModel::all();

        $salesCode = 'INV/' . date('Ymd') . '/' . rand(1, 10000);
        $salesDate = date('Y-m-d');

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'user' => $user, 'salesCode' => $salesCode, 'salesDate' => $salesDate]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'penjualan_kode' => 'required|string|unique:t_penjualan,penjualan_kode',
            'pembeli' => 'required|string',
            'penjualan_tanggal' => 'required|date',
            'barang_id' => 'required|array',
            'harga' => 'required|array',
            'jumlah' => 'required|array|min:1',
        ]);

        $trans = PenjualanModel::create([
            'user_id' => $request->user_id,
            'penjualan_kode' => $request->penjualan_kode,
            'pembeli' => $request->pembeli,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        foreach ($request->barang_id as $index => $barang_id) {
            PenjualanDetailModel::create([
                'penjualan_id' => $trans->penjualan_id,
                'barang_id' => $barang_id,
                'harga' => $request->harga[$index],
                'jumlah' => $request->jumlah[$index],
            ]);

            $stok = StokModel::where('barang_id', $barang_id)->first();

            if ($stok) {
                $stok->stok_jumlah -= $request->jumlah[$index];

                $stok->save();
            }
        }
        return redirect('/penjualan')->with('success', 'Data transaksi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = PenjualanModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan]);
    }
}