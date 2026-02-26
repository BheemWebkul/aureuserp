<?php

use Webkul\Project\Filament\Clusters\Configurations;
use Webkul\Project\Filament\Clusters\Configurations\Resources\ActivityPlanResource;
use Webkul\Project\Filament\Clusters\Configurations\Resources\MilestoneResource;
use Webkul\Project\Filament\Clusters\Configurations\Resources\ProjectStageResource;
use Webkul\Project\Filament\Clusters\Configurations\Resources\TagResource;
use Webkul\Project\Filament\Clusters\Configurations\Resources\TaskStageResource;
use Webkul\Project\Filament\Resources\ProjectResource;
use Webkul\Project\Filament\Resources\TaskResource;

return [
    'resources' => [
        'manage' => [
            MilestoneResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'],
            TagResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            ActivityPlanResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'delete_any', 'force_delete', 'force_delete_any', 'restore_any'],
            ProjectStageResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            TaskStageResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            ProjectResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
            TaskResource::class => ['view_any', 'view', 'create', 'update', 'delete', 'delete_any', 'restore', 'force_delete', 'force_delete_any', 'restore_any', 'reorder'],
        ],
        'exclude' => [],
    ],

    'pages' => [
        'exclude' => [
            Configurations::class,
        ],
    ],

];
