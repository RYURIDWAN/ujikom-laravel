<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = DB::table('user')->get();  
        return view('pengguna.index', compact('pengguna'));  //passing parameter asosiasi 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //dd(bcrypt($request->password));
            $query = DB::table('user')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),  // Enkripsi password sebelum disimpan
                'role' => $request->role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect('pengguna')->with('status', 'Pengguna berhasil ditambah...');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('pengguna')->with('status', 'Pengguna gagal ditambah...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $User_id)
    {
        $pengguna = DB::table('user')->where('User_id', $User_id)->first();
        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $User_id)
    {
        try {
            $affected = DB::table('user')
                ->where('User_id', $User_id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password), // Enkripsi password sebelum disimpan
                    'role' => $request->role,
                    'updated_at' => now()
                ]);

            return redirect('pengguna')->with('status', 'Pengguna berhasil diperbarui...');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('pengguna')->with('status', 'Pengguna gagal diperbarui...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $User_id)
    {
        DB::table('user')->where('User_id', $User_id)->delete();
        return redirect('pengguna')->with('status', 'Data pengguna berhasil dihapus...');
    }
}
