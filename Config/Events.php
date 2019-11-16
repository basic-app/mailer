<?php

use BasicApp\Helpers\Url;
use BasicApp\Config\Controllers\Admin\Config;
use BasicApp\Mailer\Forms\MailerConfigForm;
use BasicApp\Admin\AdminEvents;

AdminEvents::onOptionsMenu(function($menu) 
{
    if (Config::checkAccess())
    {
        $menu->items[MailerConfigForm::class] = [
            'label' => t('admin.menu', 'Mailer'),
            'icon' => 'fa fa-envelope',
            'url' => Url::createUrl('admin/config', ['class' => MailerConfigForm::class])
        ];
    }
});