<?php

use BasicApp\Helpers\Url;
use BasicApp\Config\Controllers\Admin\Config as ConfigController;
use BasicApp\Mailer\Forms\MailerConfigForm;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use CodeIgniter\Events\Events;

Events::on('pre_system', function()
{
    helper(['parse_recipients_string']);
});

AdminEvents::onOptionsMenu(function($menu) 
{
    if (service('admin')->can(ConfigController::class))
    {
        $menu->items[MailerConfigForm::class] = [
            'label' => t('admin.menu', 'Mailer'),
            'icon' => 'fa fa-fw fa-envelope',
            'url' => Url::createUrl('admin/config', ['class' => MailerConfigForm::class])
        ];
    }
});