<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function film(){
        $data = DB::table('tb_film')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.film',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.film_add');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function process(Request $request)
    {
        $data = DB::table('tb_user')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();
        
        if($data!=null){
            if($data->level == 1){
                session(['berhasil_login' => true, 'id_user' => $data->id]);
                return redirect('admin/film');
            }elseif($data->level == 2){
                session(['berhasil_login' => true, 'id_user' => $data->id]);
                return redirect('film');
            }
        }else{
            return redirect('admin')->with("gagal", "Gagal");
        }
    }

    public function register_process(Request $request)
    {
        DB::table('tb_user')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'level' => 2
        ]);

        return redirect('/')->with("success_register", "Sukses");
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with("logout", "Sukses");
    }

    public function store(Request $request)
    { 
		$file = $request->file('foto');
		$tujuan_upload = 'style/pict';
        $extension = $file->getClientOriginalExtension(); 
        $fileName = "pict-".date('YmdHis'). '.' . $extension; 
		$file->move($tujuan_upload,$fileName);
        DB::table('tb_film')->insert([
            'judul' => $request->judul,
            'genre' => $request->genre,
            'foto' => $fileName,
            'sinopsis' => $request->sinopsis
        ]);
        return redirect('admin/film')->with("add_sukses", 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('tb_film')
            ->find($id);

        return view('admin.film_edit',['row' => $row]);
    }
    
    public function update(Request $request)
    {
        $file = $request->file('foto');
        if($file!=null){
            $tujuan_upload = 'style/pict';
            $extension = $file->getClientOriginalExtension(); 
            $fileName = "pict-".date('YmdHis'). '.' . $extension; 
            $file->move($tujuan_upload,$fileName);
            
            unlink($tujuan_upload."/".$request->old_foto);
        }else{
            $fileName = $request->old_foto;
        }

        DB::table('tb_film')
            ->where('id', $request->id)
            ->update([
                'judul' => $request->judul,
                'genre' => $request->genre,
                'foto' => $fileName,
                'sinopsis' => $request->sinopsis
            ]);

        return redirect('admin/film')->with("edit_sukses", 1);
    }

    public function destroy($id)
    {
        $foto = DB::table('tb_film')->find($id)->foto;
        unlink("style/pict/".$foto);
        DB::table('tb_film')->where('id', $id)->delete();
        return redirect('admin/film')->with("delete_sukses", 1);
    }
}
