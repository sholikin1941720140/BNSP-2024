<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
Use Validator;
use DB;

class ArsipController extends Controller
{
    public function index()
    {
        $data = DB::table('arsips as ar')
            ->join('kategoris as kt', 'ar.kategori_id', '=', 'kt.id')
            ->select('ar.*', 'kt.nama as kategori')
            ->orderBy('ar.created_at', 'desc')
            ->get();

        return view('dashboard.arsip.index', compact('data'));
    }

    public function create()
    {
        $data = DB::table('kategoris')->get();

        return view('dashboard.arsip.create', compact('data'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $surat = DB::table('arsips')->where('no_surat', $request->no_surat)->first();
        if ($surat) {
            return redirect()->back()->with('error', 'Nomor surat sudah ada!');
        }

        if ($validator->fails()) {
            toast('Data gagal disimpan', 'error');
            return redirect()->back();
        }

        $file = $request->file('file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);

        $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        DB::table('arsips')->insert([
            'no_surat' => $request->no_surat,
            'kategori_id' => $request->kategori,
            'judul' => $request->judul,
            'file' => $fileName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('arsip-surat')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $data = DB::table('arsips as ar')
            ->join('kategoris as kt', 'ar.kategori_id', '=', 'kt.id')
            ->select('ar.*', 'kt.nama as kategori')
            ->where('ar.id', $id)
            ->first();
        $kategori = DB::table('kategoris')->get();

        return view('dashboard.arsip.show', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            // 'file' => 'mimes:pdf|max:2048',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }

        $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            $data = DB::table('arsips')->where('id', $id)->first();
            unlink(public_path('uploads').'/'.$data->file);

            DB::table('arsips')->where('id', $id)->update([
                'no_surat' => $request->no_surat,
                'kategori_id' => $request->kategori,
                'judul' => $request->judul,
                'file' => $fileName,
                'updated_at' => Carbon::now(),
            ]);

            toast('Data berhasil diupdate', 'success');
            return redirect('arsip-surat');
        }else{
            DB::table('arsips')->where('id', $id)->update([
                'no_surat' => $request->no_surat,
                'kategori_id' => $request->kategori,
                'judul' => $request->judul,
                'updated_at' => Carbon::now(),
            ]);

            toast('Data berhasil diupdate', 'success');
            return redirect('arsip-surat');
        }
    }

    public function delete($id)
    {
        $data = DB::table('arsips')->where('id', $id)->first();
        unlink(public_path('uploads').'/'.$data->file);

        DB::table('arsips')->where('id', $id)->delete();

        return redirect('arsip-surat')->with('success', 'Data berhasil dihapus!');
    }

    public function download($id)
    {
        $data = DB::table('arsips')->where('id', $id)->first();
        $path = public_path('uploads').'/'.$data->file;

        if(!file_exists($path)){
            return redirect('arsip-surat')->with('error', 'File tidak ditemukan!');
        }

        return response()->download($path);
    }
}
