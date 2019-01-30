<?php

return [
    /**
     * This is the namespace of storage class, which hold information for the storage objcet. 
     * you could specify it in your env files, or it will use default storage class if not provided.
     */
    'storage' => env('RAMEN_INVENTORY_STORAGE', 'Ordent\RamenInventory\Models\Storage'),
    /**
     * This is the namespace of item class, which hold information of the stored item.
     * you could specify it in your env files, or it will use default item class if not provided.
     */
    'item' => env('RAMEN_INVENTORY_ITEM', 'Ordent\RamenInventory\Models\Item'),
];