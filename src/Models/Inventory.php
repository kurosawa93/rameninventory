<?php

namespace Ordent\RamenInventory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Inventory extends Model
{
    protected $fillable = [
        'storage_id',
        'item_id',
        'on_hold',
        'available'
    ];

    protected $rules = [
        "store" => [
            "storage_id" => "required",
            "item_id" => "required",
            "available" => "required"
        ],
        "update" => []
    ];

    public function getRules($key = null)
    {
        if ($key != null && array_key_exists($key, $this->rules)) {
            return $this->rules[$key];
        } else {
            return [];
        }
    }

    // relation
    public function item()
    {
        $item = config('rameninventory.item');
        return $this->belongsto($item);
    }

    public function storage()
    {
        $storage = config('rameninventory.storage');
        return $this->belongsTo($storage);
    }

}
