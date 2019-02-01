<?php

namespace Ordent\RamenInventory\Services;

interface InventoryService
{
    public function deleteInventory($storageId, $productId);

    public function getStock($storageId);

    public function updateStock($storageId, $request);
    
}