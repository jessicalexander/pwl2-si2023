<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public function get_transaksi(){
        $sql = $this->select('transaksi.*', 'products.title','products.price', 'category_product.product_category_name', DB::raw('(jumlah * price) as total_harga'))
                    ->join('products', 'products.id', "=", "transaksi.product_id")
                    ->join('category_product', 'category_product.id', '=','transaksi.product_category_id');
        
        return $sql;
    }
}
