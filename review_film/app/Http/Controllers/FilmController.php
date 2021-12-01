<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        if(@$_GET['search']!=null){
            $data = DB::table('tb_film')
                ->where('judul', 'like', '%'.$_GET['search'].'%')
                ->orderBy('id', 'desc')
                ->get();
        }else{
            $data = DB::table('tb_film')
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('user.film',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = DB::table('tb_film')->find($id);
        $komen = DB::table('tb_komentar')
                ->where('id_film', $id)
                ->orderBy('id', 'desc')
                ->get();

        return view('user.film_show',['row' => $row, 'komen' => $komen]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        DB::table('tb_komentar')->insert([
            'id_film' => $request->id_film,
            'nama' => $request->nama,
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);
        return redirect('film/'.$id);
    }

    public function destroy($id)
    {
        //
    }
}
