<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    // use HasFactory;
    protected $table = "obatkeluar";
    protected $fillable = [
        'kode_ok',
        'kode_obat',
        'nama_obat',
        'tgl_klr',
        'jumlah',
        'satuan',
        'harga',
        'total'
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat','kode_obat');
    }
}
