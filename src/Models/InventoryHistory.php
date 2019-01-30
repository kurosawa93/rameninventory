<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{
    protected $fillable = [
        'inventory_id',
        'item_id',
        'storage_id',
        'stock_before',
        'stock_after',
        'date'
    ];

    protected $rules = [
        'store' => [
            'item_id' => 'required',
            'storage_id' => 'required',
            'inventory_id' => 'required',
            'stock_before' => 'required',
            'stock_after' => 'required',
            'date' => 'required'
        ],
        'update' => []
    ];

    public function getRules($key = null)
    {
        if ($key != null && array_key_exists($key, $this->rules)) {
            return $this->rules[$key];
        } else {
            return [];
        }
    }
}
