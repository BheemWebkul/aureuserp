<?php

use Webkul\Partner\Filament\Resources\AddressResource;
use Webkul\Partner\Filament\Resources\BankAccountResource;
use Webkul\Partner\Filament\Resources\BankResource;
use Webkul\Partner\Filament\Resources\IndustryResource;
use Webkul\Partner\Filament\Resources\PartnerResource;
use Webkul\Partner\Filament\Resources\TagResource;
use Webkul\Partner\Filament\Resources\TitleResource;

return [
    'resources' => [
        'manage' => [
            BankAccountResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            AddressResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            BankResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            IndustryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            PartnerResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            TagResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            TitleResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
        ],
        'exclude' => [],
    ],
];
