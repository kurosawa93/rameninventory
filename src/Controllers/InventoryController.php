<?php

namespace Ordent\RamenInventory\Controllers;

use Illuminate\Database\Eloquent\Model;
use Ordent\RamenRest\Controllers\RestController;
use Ordent\RamenRest\Processor\RestProcessor;
use Ordent\RamenInventory\Services\InventoryService;


class InventoryController extends RestController
{
    protected $model = "Ordent\RamenInventory\Models\Inventory";
    protected $uri = "/inventory/";
    protected $inventoryService;

    public function __construct(InventoryService $inventoryService, RestProcessor $processor, Model $model = null)
    {
        $this->inventoryService = $inventoryService;

        parent::__construct($processor, $model);
    }
}