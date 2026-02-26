<?php

use Webkul\Inventory\Filament\Clusters\Configurations;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\LocationResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\OperationTypeResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\PackageTypeResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\PackagingResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\ProductAttributeResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\ProductCategoryResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\RouteResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\RuleResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\StorageCategoryResource;
use Webkul\Inventory\Filament\Clusters\Configurations\Resources\WarehouseResource;
use Webkul\Inventory\Filament\Clusters\Operations;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\DeliveryResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\DropshipResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\InternalResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\OperationResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\QuantityResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\ReceiptResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\ReplenishmentResource;
use Webkul\Inventory\Filament\Clusters\Operations\Resources\ScrapResource;
use Webkul\Inventory\Filament\Clusters\Products;
use Webkul\Inventory\Filament\Clusters\Products\Resources\LotResource;
use Webkul\Inventory\Filament\Clusters\Products\Resources\PackageResource;
use Webkul\Inventory\Filament\Clusters\Products\Resources\ProductResource;

return [
    'resources' => [
        'manage' => [
            PackagingResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            ReceiptResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            DeliveryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            InternalResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            DropshipResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            QuantityResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            ScrapResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            PackageResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            LotResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            WarehouseResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            LocationResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            OperationTypeResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            RuleResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            StorageCategoryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            ProductCategoryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            ProductAttributeResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            PackageTypeResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            RouteResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            ReplenishmentResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            ProductResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
        ],
        'exclude' => [
            OperationResource::class,
        ],
    ],

    'pages' => [
        'exclude' => [
            Configurations::class,
            Operations::class,
            OperationResource::class,
            Products::class,
        ],
    ],

];
