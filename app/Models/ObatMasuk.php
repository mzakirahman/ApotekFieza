<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    use HasFactory;
    protected $table = "obatmasuk";
    protected $fillable = [
        'kode_om',
        'kode_obat',
        'tgl_msk',
        'nama_obat',
        'jumlah',
        'satuan',
        'harga',
        'expired',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat','kode_obat');
    }
}
