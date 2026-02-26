<?php

use Webkul\Accounting\Filament\Clusters\Accounting;
use Webkul\Accounting\Filament\Clusters\Accounting\Resources\JournalEntryResource;
use Webkul\Accounting\Filament\Clusters\Accounting\Resources\JournalItemResource;
use Webkul\Accounting\Filament\Clusters\Configuration;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\AccountResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\CashRoundingResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\CurrencyResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\FiscalPositionResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\IncotermResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\JournalResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\PaymentTermResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\ProductAttributeResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\ProductCategoryResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\TaxGroupResource;
use Webkul\Accounting\Filament\Clusters\Configuration\Resources\TaxResource;
use Webkul\Accounting\Filament\Clusters\Customers;
use Webkul\Accounting\Filament\Clusters\Customers\Resources\CreditNoteResource;
use Webkul\Accounting\Filament\Clusters\Customers\Resources\CustomerResource;
use Webkul\Accounting\Filament\Clusters\Customers\Resources\InvoiceResource;
use Webkul\Accounting\Filament\Clusters\Customers\Resources\PaymentResource;
use Webkul\Accounting\Filament\Clusters\Customers\Resources\ProductResource;
use Webkul\Accounting\Filament\Clusters\Vendors;
use Webkul\Accounting\Filament\Clusters\Vendors\Resources\BillResource;
use Webkul\Accounting\Filament\Clusters\Vendors\Resources\PaymentResource as ResourcesPaymentResource;
use Webkul\Accounting\Filament\Clusters\Vendors\Resources\ProductResource as ResourcesProductResource;
use Webkul\Accounting\Filament\Clusters\Vendors\Resources\RefundResource;
use Webkul\Accounting\Filament\Clusters\Vendors\Resources\VendorResource;
use Webkul\Accounting\Filament\Widgets\JournalChartsWidget;

return [
    'resources' => [
        'manage' => [
            JournalEntryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            JournalItemResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            AccountResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            CashRoundingResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            CurrencyResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            FiscalPositionResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            IncotermResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            JournalResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            PaymentTermResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            ProductAttributeResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            ProductCategoryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            TaxGroupResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            TaxResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            CreditNoteResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            CustomerResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            InvoiceResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            PaymentResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            ProductResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            BillResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            RefundResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'reorder'],
            VendorResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
        ],
        'exclude' => [
            ResourcesProductResource::class,
            ResourcesPaymentResource::class,
        ],
    ],

    'pages' => [
        'exclude' => [
            Vendors::class,
            Customers::class,
            Accounting::class,
            Configuration::class,
        ],
    ],

    'widgets' => [
        'exclude' => [
            JournalChartsWidget::class,
        ],
    ],

];
