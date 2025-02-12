<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
/**
* Display a listing of the resource.
*/
public function index()
{
    $Pembelian = DB::table('tbl_pembelian')->get();
    dd($Pembelian); // Akan menampilkan isi data pembelian untuk diperiksa
    return view('Pembelian/index', compact('Pembelian'));
}
/**
* Show the form for creating a new resource.
*/
public function create()
    {
    // dd('create');
    return view('Pembelian/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //: RedirectResponse
{
// dd('store');
try
{
$query=DB::table('tbl_pembelian')->insert([
'id_pembelian' => $request ->id_pembelian,
'Pembelian_barang' => $request ->Pembelian_barang
]);
return redirect('Pembelian')-> with ('status', 'Pembelian berhasil ditambah..');
}
catch(\Illuminate\Database\QueryException $ex){
return redirect('Pembelian')-> with ('status', $ex);
}
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pembelian)
{
$Pembelian = DB::table('tbl_pembelian')->where('id_pembelian', $id_pembelian)->first();
return view('Pembelian/edit', compact('Pembelian'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pembelian) 
    // : RedirectResponse
    {
    // dd('update'); 
    try
    { 
    $affected = DB::table('tbl_pembelian') ->where('id_pembelian', $id_pembelian)
    ->update([ 
    'Pembelian_barang' => $request ->Pembelian_barang 
    ]);
    return redirect('Pembelian')-> with ('status', 'Pembelian berhasil diubah..'); 
    } 
    catch(\Illuminate\Database\QueryException $ex)
    { 
    return redirect('Pembelian')-> with ('status', 'Pembelian gagal ditambah..'); 
    } 
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pembelian)
// : RedirectResponse
{
// dd('delete');
$Pembelian = DB::table('tbl_pembelian')->where('id_pembelian', $id_pembelian)->delete(); 
return redirect('Pembelian')-> with ('status', 'Data Pembelian berhasil dihapus..'); 
}
}