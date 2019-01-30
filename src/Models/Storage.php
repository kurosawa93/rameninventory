<?php

namespace Ordent\RamenInventory\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'name',
        'address'
    ];

    protected $rules = [
        'store' => [],
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

    // relation
    public function inventory()
    {
        $this->hasMany('Ordent\RamenInventory\Models\Inventory');
    }
}