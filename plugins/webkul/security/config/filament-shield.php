<?php

use Webkul\Security\Filament\Resources\CompanyResource;
use Webkul\Security\Filament\Resources\RoleResource;
use Webkul\Security\Filament\Resources\TeamResource;
use Webkul\Security\Filament\Resources\UserResource;

return [
    'resources' => [
        'manage' => [
            TeamResource::class => ['view_any', 'view', 'create', 'update', 'delete'],
            UserResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            CompanyResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            RoleResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
        ],
        'exclude' => [],
    ],

];
