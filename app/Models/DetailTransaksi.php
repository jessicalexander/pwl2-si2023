<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    // Fillable properties
    protected $fillable = [
        'id_product',
        'jumlah',
        'id_transaksi',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
