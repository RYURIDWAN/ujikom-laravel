<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Menentukan nama tabel yang digunakan
    protected $table = 'transaction';

    // Menentukan primary key yang digunakan
    protected $primaryKey = 'transaction_id';

    // Menentukan apakah primary key adalah auto-increment atau tidak
    public $incrementing = true;

    // Menentukan tipe data primary key (bisa berupa integer, string, dll)
    protected $keyType = 'int';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'type',
        'documentation',
        'approved_id',
        'description',
        'inventory_id',
        'good_stock',
    ];
}
