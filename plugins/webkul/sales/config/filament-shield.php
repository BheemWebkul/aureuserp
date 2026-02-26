<?php

use Webkul\Sale\Filament\Clusters\Configuration;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\ActivityPlanResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\ActivityTypeResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\CurrencyResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\PackagingResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\ProductAttributeResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\ProductCategoryResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\TagResource;
use Webkul\Sale\Filament\Clusters\Configuration\Resources\TeamResource;
use Webkul\Sale\Filament\Clusters\Orders;
use Webkul\Sale\Filament\Clusters\Orders\Resources\CustomerResource;
use Webkul\Sale\Filament\Clusters\Orders\Resources\OrderResource;
use Webkul\Sale\Filament\Clusters\Orders\Resources\QuotationResource;
use Webkul\Sale\Filament\Clusters\Products;
use Webkul\Sale\Filament\Clusters\Products\Resources\ProductResource;
use Webkul\Sale\Filament\Clusters\ToInvoice;
use Webkul\Sale\Filament\Clusters\ToInvoice\Resources\OrderToInvoiceResource;
use Webkul\Sale\Filament\Clusters\ToInvoice\Resources\OrderToUpsellResource;

return [
    'resources' => [
        'manage' => [
            QuotationResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            OrderResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            OrderToInvoiceResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            OrderToUpsellResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            CustomerResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            ProductResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            ActivityPlanResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            ActivityTypeResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            TeamResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            ProductCategoryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            ProductAttributeResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            TagResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            PackagingResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            CurrencyResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
        ],
        'exclude' => [],
    ],

    'pages' => [
        'exclude' => [
            Configuration::class,
            Orders::class,
            Products::class,
            ToInvoice::class,
        ],
    ],

];
