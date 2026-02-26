<?php

use Webkul\Blog\Filament\Admin\Clusters\Configurations\Resources\CategoryResource;
use Webkul\Blog\Filament\Admin\Clusters\Configurations\Resources\TagResource;
use Webkul\Blog\Filament\Admin\Resources\PostResource;
use Webkul\Blog\Filament\Customer\Resources\CategoryResource as ResourcesCategoryResource;
use Webkul\Blog\Filament\Customer\Resources\PostResource as ResourcesPostResource;

return [
    'resources' => [
        'manage' => [
            CategoryResource::class => ['view_any', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            TagResource::class => ['view_any', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            PostResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            ResourcesCategoryResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
            ResourcesPostResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any'],
        ],
        'exclude' => [],
    ],

];
