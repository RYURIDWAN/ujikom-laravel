<?php

namespace App\Http\Controllers;

use App\Models\Transaction;  // Import model Transaction
use App\Models\Inventory;    // Import model Inventory
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = DB::table('transaction')
            ->join('inventory', 'transaction.inventory_id', '=', 'inventory.inventory_id')
            ->select('transaction.*', 'inventory.product_name') // Mengambil data transaction dan product_name
            ->get();

        return view('transaction.index', compact('transaction'));
    }

    public function create()
    {
        $inventory = Inventory::all(); // Mengambil semua data dari tabel inventory
        return view('transaction.create', compact('inventory'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventory,inventory_id',
            'type' => 'required|in:Inbound,Outbound',
            'documentation' => 'nullable|file|mimes:jpg,png,pdf|max:10240',
            'approved_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'good_stock' => 'required|integer',
        ]);

        // Menangani upload file
        $documentationPath = null;
        if ($request->hasFile('documentation')) {
            $documentationPath = $request->file('documentation')->store('public/documentations');
        }

        // Menyimpan data transaksi menggunakan Eloquent
        try {
            Transaction::create([
                'type' => $request->type,
                'documentation' => $documentationPath,
                'approved_id' => $request->approved_id,
                'description' => $request->description,
                'inventory_id' => $request->inventory_id,
                'good_stock' => $request->good_stock,
            ]);

            return redirect('transaction')->with('status', 'Transaksi berhasil ditambah!');
        } catch (\Exception $ex) {
            return redirect('transaction')->with('status', 'Terjadi kesalahan: ' . $ex->getMessage());
        }
    }

    public function edit(string $transaction_id)
    {
        // Mengambil transaksi berdasarkan transaction_id dan semua inventory
        $transaction = Transaction::where('transaction_id', $transaction_id)->first();  // Perubahan disini, menggunakan transaction_id
        if (!$transaction) {
            return redirect('transaction')->with('status', 'Transaksi tidak ditemukan.');
        }

        $inventory = Inventory::all();
        return view('transaction.edit', compact('transaction', 'inventory'));
    }

    public function update(Request $request, $transaction_id)
    {
        // Validasi inputan
        $validated = $request->validate([
            'inventory_id' => 'required|exists:inventory,inventory_id',
            'type' => 'required|in:Inbound,Outbound',
            'documentation' => 'nullable|file|mimes:jpg,png,pdf|max:10240',
            'approved_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'good_stock' => 'required|integer',
        ]);

        // Menangani upload file
        $documentationPath = null;
        if ($request->hasFile('documentation')) {
            $documentationPath = $request->file('documentation')->store('public/documentations');
        }

        // Update data transaksi
        try {
            $transaction = Transaction::where('transaction_id', $transaction_id)->first();  // Perubahan disini, menggunakan transaction_id
            if (!$transaction) {
                return redirect('transaction')->with('status', 'Transaksi tidak ditemukan.');
            }

            $transaction->update([
                'inventory_id' => $request->inventory_id,
                'type' => $request->type,
                'documentation' => $documentationPath ? $documentationPath : $transaction->documentation, // Gunakan path lama jika tidak ada file baru
                'approved_id' => $request->approved_id,
                'description' => $request->description,
                'good_stock' => $request->good_stock,
                'updated_at' => now(),
            ]);

            return redirect('transaction')->with('status', 'Transaksi berhasil diperbarui!');
        } catch (\Exception $ex) {
            return redirect('transaction')->with('status', 'Gagal memperbarui transaksi: ' . $ex->getMessage());
        }
    }

    public function destroy(string $transaction_id)
    {
        try {
            $transaction = Transaction::where('transaction_id', $transaction_id)->first();  // Perubahan disini, menggunakan transaction_id
            if (!$transaction) {
                return redirect('transaction')->with('status', 'Transaksi tidak ditemukan.');
            }

            $transaction->delete(); // Menggunakan Eloquent untuk menghapus data transaksi

            return redirect('transaction')->with('status', 'Data transaksi berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('transaction')->with('status', 'Gagal menghapus transaksi: ' . $ex->getMessage());
        }
    }
}
