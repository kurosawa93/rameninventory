<?php

namespace Ordent\RamenInventory\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function getStock($storageId, Request $request)
    {
        $result = $this->inventoryService->getStock($storageId);
        return $this->createResponse($result);
    }

    

    private function createResponse($result)
    {
        $format = new \stdClass;
        $format->data = $value;

        $format->meta = new \stdClass;
        $format->meta->status_code = 200;
        $format->meta->message = 'Operation successfully called';
        return response()->createResponse(json($format));
    }
}