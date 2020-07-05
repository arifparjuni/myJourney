<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class ArtikelController extends Controller
{
    public function index()
    {
        // mengambil data dari table post
        $post = DB::table('pegawai')->paginate(10);

        // mengirim data post ke view index
        return view('cari.index', ['post' => $post]);
    }

    public function cari(Request $request)
    {
        // menangkap  data pencarian
        $cari = $request->cari;

        // mengambil data dari table post sesuai pencarian
        $post = DB::table('post')
        ->where('title','like',"%".$cari."%")
        ->paginate();

        // mengirim data pegawai ke view index
        return view('cari.index', ['post' => 'post']);
    }

}
