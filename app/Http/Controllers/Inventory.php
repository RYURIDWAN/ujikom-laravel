<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class inventory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = DB::table('inventory')
            ->join('location', 'inventory.location_id', '=', 'location.location_id') // Menyambungkan tabel inventory dan location berdasarkan location_id
            ->select('inventory.*', 'location.name as location_name') // Mengambil semua kolom dari inventory dan nama location
            ->get();

        return view('inventory.index', compact('inventory'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = DB::table('location')->get(); // Mengambil semua data lokasi
        return view('inventory.create', compact('locations')); // Passing data ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi
            $request->validate([
                'inventory_id' => 'required|unique:inventory,inventory_id',
                'product_name' => 'required|string|max:100',
                'description' => 'nullable|string',
                'quantity_good' => 'required|integer|min:0',
                'expired' => 'nullable|date',
                'location_id' => 'required|exists:location,location_id',
                'status' => 'required|in:Active,Inactive',
                'unit' => 'required|string|max:50',
            ]);

            // Insert data ke database
            DB::table('inventory')->insert([
                'inventory_id' => $request->inventory_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'quantity_good' => $request->quantity_good,
                'expired' => $request->expired,
                'location_id' => $request->location_id,
                'status' => $request->status,
                'unit' => $request->unit,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Redirect dengan pesan sukses
            return redirect('inventory')->with('success', 'Data inventory berhasil ditambahkan!');
        } catch (\Exception $ex) {
            // Redirect dengan pesan error jika ada masalah
            return redirect('inventory')->with('status', 'Gagal menambahkan data: ' . $ex->getMessage());
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
    public function edit($id)
    {
        // Mengambil data inventory berdasarkan id
        $inventory = DB::table('inventory')->where('inventory_id', $id)->first();

        // Mengambil semua data lokasi untuk dropdown
        $locations = DB::table('location')->get();

        // Menampilkan view edit dengan membawa data inventory dan lokasi
        return view('inventory.edit', compact('inventory', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'inventory_id' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'quantity_good' => 'required|integer|min:0',
            'expired' => 'nullable|date',
            'location_id' => 'required|exists:location,location_id',
            'status' => 'required|in:Active,Inactive',
            'unit' => 'required|string|max:50',
        ]);

        // Mengupdate data inventory menggunakan DB::update
        DB::table('inventory')->where('inventory_id', $id)->update([
            'inventory_id' => $request->inventory_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'quantity_good' => $request->quantity_good,
            'expired' => $request->expired,
            'location_id' => $request->location_id,
            'status' => $request->status,
            'unit' => $request->unit,
        ]);

        // Redirect kembali ke halaman inventory dengan pesan sukses
        return redirect('inventory')->with('success', 'Data Inventory berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $inventory_id)
    {
        try {
            $inventory = DB::table('inventory')->where('inventory_id', $inventory_id);
            if (!$inventory->exists()) {
                return redirect('inventory')->with('status', 'Data tidak ditemukan.');
            }
            // Hapus data
            $inventory->delete();
            return redirect('inventory')->with('success', 'Data inventory berhasil dihapus!');
        } catch (\Exception $ex) {
            return redirect('inventory')->with('status', 'Gagal menghapus data: ' . $ex->getMessage());
        }
    }
}