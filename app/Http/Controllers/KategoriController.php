<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data = DB::table('kategoris')->get();

        return view('dashboard.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        if($validatedData->fails()) {
            toast('Data gagal ditambahkan!', 'error');
            return redirect()->back();
        }

        $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('kategoris')->insert([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('kategori')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = DB::table('kategoris')->where('id', $id)->first();

        return view('dashboard.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        if($validatedData->fails()) {
            toast('Data gagal diubah!', 'error');
            return redirect()->back();
        }

        $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('kategoris')->where('id', $id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'updated_at' => $now
        ]);

        return redirect('kategori')->with('success', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        DB::table('kategoris')->where('id', $id)->delete();

        return redirect('kategori')->with('success', 'Data berhasil dihapus!');
    }
}
