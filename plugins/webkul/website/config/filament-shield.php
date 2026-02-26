<?php

use Webkul\Website\Filament\Admin\Clusters\Configurations;
use Webkul\Website\Filament\Admin\Resources\PageResource;
use Webkul\Website\Filament\Admin\Resources\PartnerResource;
use Webkul\Website\Filament\Customer\Resources\PageResource as ResourcesPageResource;

return [
    'resources' => [
        'manage' => [
            PageResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            PartnerResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            ResourcesPageResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
        ],
        'exclude' => [],
    ],

    'pages' => [
        'exclude' => [
            Configurations::class,
        ],
    ],

];
