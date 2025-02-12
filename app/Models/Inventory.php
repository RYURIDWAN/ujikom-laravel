<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'inventory'; 

    // Tentukan primary key jika tidak menggunakan 'id' secara default
    protected $primaryKey = 'inventory_id';

    // Menambahkan fillable jika perlu (jika ingin menggunakan mass assignment)
    protected $fillable = ['inventory_id', 'product_name', 'description', 'stock'];
}

