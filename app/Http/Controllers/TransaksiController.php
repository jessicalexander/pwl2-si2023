<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index():view
    {
        $transaksi = new Transaksi;
        $trans = $transaksi->get_transaksi()
                            -> latest()
                            ->paginate(10);
        
        return view('transaksi.index', compact('trans'));
    }
}
