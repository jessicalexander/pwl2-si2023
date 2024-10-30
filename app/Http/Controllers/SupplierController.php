<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class SupplierController extends Controller
{
    /**
     * index
     * 
     * @return view
     */
    public function index() : View
    {
        $supplier = new Supplier;
        $suppliers = $supplier->get_supplier()
                            ->latest()
                            ->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * create
     * 
     * @return View
     */
    public function create(): View
    {
        $supplier = new Supplier; // Ganti 'supplier' menjadi 'Supplier'

        $data['suppliers'] = $supplier->get_supplier()->get();

        return view('suppliers.create', compact('data'));
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     * 
     */
    public function store(Request $request): RedirectResponse // Ubah 'request' menjadi 'Request'
    {
        $validatedData = $request->validate([
            'supplier_name'         => 'required|string',
            'alamat_supplier'       => 'required|string',
            'no_hp'                 => 'required|string', // Perbaiki 'pmg' menjadi 'png'
            'pic_supplier'          => 'required|string',
        ]);

        Supplier::create($validatedData);

        return redirect()->route('suppliers.index')->with(['success'=> 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $supplier_model = new Supplier;
        $supplier = $supplier_model->get_supplier()->where("suppliers.id", $id)->firstOrFail();

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $supplier_model = new Supplier;
        $data['supplier'] = $supplier_model->get_supplier()->where("suppliers.id", $id)->firstOrFail();
        

        $supplier_model = new Supplier;

        $data['suppliers_'] = $supplier_model->get_supplier()->get();

        return view('suppliers.edit', compact('data'));
    }

    /**
     * update
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $validatedData = $request->validate([
            'supplier_name'         => 'required|string',
            'alamat_supplier'       => 'required|string',
            'no_hp'                 => 'required|string',
            'pic_supplier'          => 'required|string',
        ]);

        $supplier_model = new Supplier;
        $supplier = $supplier_model->get_supplier()->where("suppliers.id", $id)->firstOrFail();

        $supplier->update($validatedData);

    return redirect()->route('suppliers.index')->with(['success' => 'Data Berhasil Diubah!']);
     }
     /**
      * destroy
      *
      *@param mixed $id
      *@return RedirectResponse
      */
     public function destroy($id): RedirectResponse{

          $supplier_model = new Supplier;
          $supplier = $supplier_model->get_supplier()->where("suppliers.id", $id)->firstOrFail();
      
          Storage::delete('public/images'.$supplier->image);
      
          //delete product pada database
          $supplier->delete();
      
          return redirect()->route('suppliers.index')->with(['success'=>'Data Berhasil Dihapus!']);
      
        }

}