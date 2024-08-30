<?php

//use RickDBCN\FilamentEmail\Models\Email;
use RickDBCN\FilamentEmail\Filament\Resources\EmailResource;

return [

    'resource' => [
        'class' => EmailResource::class,
        'model' => \App\Models\Email::class,
        'group' => null,
        'sort' => null,
        'icon' => null,
        'default_sort_column' => 'created_at',
        'default_sort_direction' => 'desc',
        'datetime_format' => 'Y-m-d H:i:s',
        'table_search_fields' => [
            'subject',
            'from',
            'to',
            'cc',
            'bcc',
        ],
    ],

    'keep_email_for_days' => 60,

    'label' => null,

    'prune_enabled' => true,

    'prune_crontab' => '0 0 * * *',

    'can_access' => [
        'role' => [],
    ],

    'pagination_page_options' => [
        10, 25, 50, 'all',
    ],

    'attachments_disk' => 'local',
    'store_attachments' => true,

    //Create Team model and uncomment the line below to enable Tenant mode
    'tenant_model' => \App\Models\Team::class,

];
