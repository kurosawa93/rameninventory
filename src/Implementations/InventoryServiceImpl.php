<?php

namespace Ordent\RamenInventory\Implementations;

use Ordent\RamenInventory\Services\InventoryService;
use Ordent\RamenInventory\Models\Inventory;
use ReflectionClass;

class InventoryServiceImpl implements InventoryService
{
    protected $item;
    protected $storage;

    public function __construct()
    {
        $item = new ReflectionClass(config('rameninventory.item'));
        $storage = new ReflectionClass(config('rameninventory.item'));
    }

    public function deleteInventory($storageId, $itemId)
    {
        $inventory = Inventory::where([
            ['storage_id', '=', $storageId],
            ['item_id', '=', $itemId]
        ]).firstOrFail();

        return $inventory->delete();
    }

    public function getStock($storageId)
    {
        $inventories = Inventory::where('storage_id', $storageId)->get();
        $results = array();

        foreach ($inventories as $inventory) {
            $item = $item::findOrFail($inventory->item_id);
            $item->stock = $inventory->available;

            array_push($results, $result);
        }
        return $results;
    }

    public function updateStock($storageId, $request)
    {
        foreach ($request->product_id as $key => $value) {
            $inventory = Inventory::where([
                ['warehouse_id', '=', $warehouseId],
                ['product_id', '=', $value]
            ])->first();
            
            if (is_null($inventory))
            {
                $inventory = new Inventory();
                $inventory->warehouse_id = $warehouseId;
                $inventory->product_id = $value;
            }

            if (!is_null($request->on_hold)) {
                if(array_key_exists($key, $request->on_hold) && !is_null($request->on_hold[$key])) {
                    $inventory->on_hold = $request->on_hold[$key];
                }
            }
            
            if (!is_null($request->available)) {
                if(array_key_exists($key, $request->available) && !is_null($request->available[$key])) {
                    $inventory->available = $request->available[$key];
                }
            }
            
            $inventory->save();
        }

        // get updated value
        $result = Inventory::where('storage_id', $storageId)->get();
        return $result;    
    }
}