<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;


class KategoriController extends Controller
{

    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function  store(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('category', [
            'kategori_kode' => 'bail|required|unique:m_kategori|max:255',
            'kategori_nama' => 'required'
        ]);

        $validated = $request->validate([
            'kategori_kode' => 'required',
            'kategori_nama' => 'required',
        ]);

        return redirect('/kategori');
    }

    public function update($id)
    {
        $data = KategoriModel::find($id);
        return view('kategori.update', ['kategori' => $data]);
    }

    public function update_save(Request $request, $id)
    {
        $data = KategoriModel::find($id);
        $data->kategori_kode = $request->kodeKategori;
        $data->kategori_nama = $request->namaKategori;
        $data->save();

        return redirect('/kategori');
    }

    public function delete($id)
    {
        $data = KategoriModel::find($id);
        $data->delete();

        return redirect('/kategori');
    }
}
