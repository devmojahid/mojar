<?php

namespace Modules\Core\Supports;

use Modules\Core\Facades\HookAction;

class MenuAction
{
    public function getAllMenus()
    {
        return $this->allMenus();
    }

    public function allMenus()
    {
        HookAction::addAdminMenu('Dashboard', 'dashboard', [
            'icon' => 'fa fa-tachometer-alt',
            'position' => 10,
            'permission' => '[admin]',
            'url' => 'dashboard',
            'turbolinks' => true,
        ]);
    }
}