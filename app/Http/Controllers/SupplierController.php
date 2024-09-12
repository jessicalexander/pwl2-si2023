<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index():view
    {
        $supplier = new Supplier;
        $suppliers = $supplier->get_supplier()
                            -> latest()
                            ->paginate(10);
        
        return view('supplier.index', compact('suppliers'));
    }
}
