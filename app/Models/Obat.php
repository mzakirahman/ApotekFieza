<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = "obat";
    protected $fillable = [
        'id',
        'kode_obat',
        'nama_obat',
        'jenis_obat',
        'kategori',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan'
    ];
}
