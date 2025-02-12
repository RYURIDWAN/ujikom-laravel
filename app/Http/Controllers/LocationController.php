<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = DB::table('location')->get();  
        return view ('location/index', compact('location'));  //passing parameter asosiasi 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view ('location/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try 
        {
             $query=DB::table('location')->insert([
                'location_id' => $request ->location_id,  
                'name' => $request ->name,
                'description' => $request ->description,
                'created_at' => now(),
                'updated_at' => now(), 
                ]);  
            return  redirect('location')-> with ('status', 'location berhasil ditambah..'); 
        } 
                catch(\Illuminate\Database\QueryException $ex){  
                return  redirect('location')-> with ('status', $ex); 
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
    public function edit(string $location_id)
    {
        $location = DB::table('location')->where('location_id', $location_id)->first();   
        return  view('location/edit', compact('location'));   
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $location_id)
    // {
    //    //      dd($location_id); 
    //    try 
    //    { 
    //    $affected = DB::table('location') ->where('location_id', $location_id)
    //    ->update([ 
    //     'name' => $request ->name,  
    //     'description' => $request ->description,   
    //     'updated_at' => $request ->now()  
    // ]);
    //    } 
    //        catch(\Illuminate\Database\QueryException $ex)
    //        {  
    //        return  redirect('location')-> with ('status', 'location gagal ditambah..'); 
    //    } 
    // }

    public function update(Request $request, string $location_id)
    {
        try {
            $affected = DB::table('location')
                ->where('location_id', $location_id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'updated_at' => now()  // Menggunakan fungsi global now() di sini
                ]);
    
            return redirect('location')->with('status', 'Location berhasil diperbarui...');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('location')->with('status', 'Location gagal diperbarui...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $location_id)
    {
        $location = DB::table('location')->where('location_id', $location_id)->delete();      
        return  redirect('location')-> with ('status', 'Data location berhasil dihapus..');  
    }
}