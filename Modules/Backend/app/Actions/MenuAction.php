<?php

namespace Modules\Backend\app\Actions;

use Modules\Core\app\Abstracts\Action;
use Modules\Core\Facades\Hook;
use Modules\Core\Facades\HookAction;

class MenuAction extends Action
{
    public function handle()
    {
        Hook::addAction(self::BACKEND_CALL_ACTION, [$this, "addBackendMenu"]);
    }

    public function addBackendMenu()
    {
        HookAction::addAdminMenu(
            "Dashboard",
            'dashboard',
            [
                'icon' => 'fa fa-dashboard',
                'position' => 1,
            ]
        );

        HookAction::addAdminMenu(
            "Dashboard",
            'dashboard',
            [
                'icon' => 'fa fa-dashboard',
                'position' => 1,
                'parent' => 'dashboard',
            ]
        );

        HookAction::addAdminMenu(
            "Updates",
            'updates',
            [
                'icon' => 'fa fa-arrow-circle-o-up',
                'position' => 1,
                'parent' => 'dashboard',
            ]
        );
    }
}
