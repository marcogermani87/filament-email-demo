<?php

return [

    'email_factory_count' => env('FILAMENT_EMAIL_FACTORY_COUNT', 25),

    'email_factory_to_max' => env('FILAMENT_EMAIL_FACTORY_TO_MAX', 3),

    'email_factory_cc_max' => env('FILAMENT_EMAIL_FACTORY_CC_MAX', 5),

    'email_factory_bcc_max' => env('FILAMENT_EMAIL_FACTORY_BCC_MAX', 5),

    'email_factory_attachments_max' => env('FILAMENT_EMAIL_FACTORY_ATTACHMENTS_MAX', 3),

    'chown_user' => env('FILAMENT_EMAIL_DEMO_CHOWN_USER', 'www-data'),

    'chmod_permissions' => env('FILAMENT_EMAIL_DEMO_CHMOD_PERMISSION', 0775),

];
