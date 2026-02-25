<?php

use Illuminate\Support\Facades\Route;
use Webkul\Inventory\Http\Controllers\API\V1\DeliveryController;
use Webkul\Inventory\Http\Controllers\API\V1\DropshipController;
use Webkul\Inventory\Http\Controllers\API\V1\InternalTransferController;
use Webkul\Inventory\Http\Controllers\API\V1\LocationController;
use Webkul\Inventory\Http\Controllers\API\V1\LotController;
use Webkul\Inventory\Http\Controllers\API\V1\OperationTypeController;
use Webkul\Inventory\Http\Controllers\API\V1\PackageController;
use Webkul\Inventory\Http\Controllers\API\V1\PackageTypeController;
use Webkul\Inventory\Http\Controllers\API\V1\ProductController;
use Webkul\Inventory\Http\Controllers\API\V1\QuantityController;
use Webkul\Inventory\Http\Controllers\API\V1\ReceiptController;
use Webkul\Inventory\Http\Controllers\API\V1\RouteController;
use Webkul\Inventory\Http\Controllers\API\V1\RuleController;
use Webkul\Inventory\Http\Controllers\API\V1\ScrapController;
use Webkul\Inventory\Http\Controllers\API\V1\StorageCategoryController;
use Webkul\Inventory\Http\Controllers\API\V1\TagController;
use Webkul\Inventory\Http\Controllers\API\V1\WarehouseController;

Route::name('admin.api.v1.inventories.')->prefix('admin/api/v1/inventories')->middleware(['auth:sanctum'])->group(function () {
    Route::softDeletableApiResource('warehouses', WarehouseController::class);
    Route::softDeletableApiResource('locations', LocationController::class);
    Route::softDeletableApiResource('routes', RouteController::class);
    Route::softDeletableApiResource('operation-types', OperationTypeController::class);
    Route::softDeletableApiResource('rules', RuleController::class);
    Route::apiResource('storage-categories', StorageCategoryController::class);
    Route::apiResource('package-types', PackageTypeController::class);
    Route::softDeletableApiResource('tags', TagController::class);
    Route::softDeletableApiResource('products', ProductController::class);
    Route::apiResource('packages', PackageController::class);
    Route::apiResource('lots', LotController::class);

    Route::apiResource('receipts', ReceiptController::class);
    Route::post('receipts/{id}/check-availability', [ReceiptController::class, 'checkAvailability'])->name('receipts.check-availability');
    Route::post('receipts/{id}/todo', [ReceiptController::class, 'todo'])->name('receipts.todo');
    Route::post('receipts/{id}/validate', [ReceiptController::class, 'validateTransfer'])->name('receipts.validate');
    Route::post('receipts/{id}/cancel', [ReceiptController::class, 'cancelTransfer'])->name('receipts.cancel');
    Route::post('receipts/{id}/return', [ReceiptController::class, 'returnTransfer'])->name('receipts.return');

    Route::apiResource('deliveries', DeliveryController::class);
    Route::post('deliveries/{id}/check-availability', [DeliveryController::class, 'checkAvailability'])->name('deliveries.check-availability');
    Route::post('deliveries/{id}/todo', [DeliveryController::class, 'todo'])->name('deliveries.todo');
    Route::post('deliveries/{id}/validate', [DeliveryController::class, 'validateTransfer'])->name('deliveries.validate');
    Route::post('deliveries/{id}/cancel', [DeliveryController::class, 'cancelTransfer'])->name('deliveries.cancel');
    Route::post('deliveries/{id}/return', [DeliveryController::class, 'returnTransfer'])->name('deliveries.return');

    Route::apiResource('internal-transfers', InternalTransferController::class);
    Route::post('internal-transfers/{id}/check-availability', [InternalTransferController::class, 'checkAvailability'])->name('internal-transfers.check-availability');
    Route::post('internal-transfers/{id}/todo', [InternalTransferController::class, 'todo'])->name('internal-transfers.todo');
    Route::post('internal-transfers/{id}/validate', [InternalTransferController::class, 'validateTransfer'])->name('internal-transfers.validate');
    Route::post('internal-transfers/{id}/cancel', [InternalTransferController::class, 'cancelTransfer'])->name('internal-transfers.cancel');
    Route::post('internal-transfers/{id}/return', [InternalTransferController::class, 'returnTransfer'])->name('internal-transfers.return');

    Route::apiResource('dropships', DropshipController::class);
    Route::post('dropships/{id}/check-availability', [DropshipController::class, 'checkAvailability'])->name('dropships.check-availability');
    Route::post('dropships/{id}/todo', [DropshipController::class, 'todo'])->name('dropships.todo');
    Route::post('dropships/{id}/validate', [DropshipController::class, 'validateTransfer'])->name('dropships.validate');
    Route::post('dropships/{id}/cancel', [DropshipController::class, 'cancelTransfer'])->name('dropships.cancel');
    Route::post('dropships/{id}/return', [DropshipController::class, 'returnTransfer'])->name('dropships.return');

    Route::apiResource('quantities', QuantityController::class)->except(['destroy']);
    Route::post('quantities/{id}/apply', [QuantityController::class, 'apply'])->name('quantities.apply');
    Route::post('quantities/{id}/clear', [QuantityController::class, 'clear'])->name('quantities.clear');

    Route::apiResource('scraps', ScrapController::class);
    Route::post('scraps/{id}/validate', [ScrapController::class, 'validateScrap'])->name('scraps.validate');
});
