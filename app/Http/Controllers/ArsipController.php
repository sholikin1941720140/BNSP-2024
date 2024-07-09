<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index()
    {
        $data = DB::table('arsips as ar')
            ->join('kategoris as kt', 'ar.kategori_id', '=', 'kt.id')
            ->select('ar.*', 'kategoris.nama as kategori')
            ->get();

        return view('dashboard.arsip.index', compact('data'));
    }

    public function create()
    {
        $data = DB::table('kategoris')->get();

        return view('dashboard.arsip.create', compact('data'));
    }
}
