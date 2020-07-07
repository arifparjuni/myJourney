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
        $posts = DB::table('posts')->paginate(10);

        // mengirim data post ke view index
        return view('posts.index', compact('posts', $posts));
    }

    public function cari(Request $request)
    {
        // menangkap  data pencarian
        $cari = $request->cari;

        // mengambil data dari table post sesuai pencarian
        $posts = DB::table('posts')
        ->where('title','like',"%".$cari."%")
        ->paginate();

        // mengirim data pegawai ke view index
        return view('posts.index', compact('posts', $posts));
    }

}
