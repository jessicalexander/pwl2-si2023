<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_name',
        'alamat_supplier',
        'no_hp',
        'pic_supplier',
    ];

    /**
     * Get supplier query builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get_supplier()
    {
        $sql = $this->select('id', 'supplier_name', 'alamat_supplier', 'no_hp', 'pic_supplier');
        
        return $sql;
    }
}
