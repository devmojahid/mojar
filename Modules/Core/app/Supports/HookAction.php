<?php

namespace Modules\Core\Supports;

use Modules\Core\Contracts\GlobalDataContract;
use Modules\Core\Contracts\HookActionContract;
use Modules\Core\Facades\GlobalData;
use Modules\Core\Traits\MenuHookAction;

class HookAction implements HookActionContract
{

    use MenuHookAction;
    public function __construct(public GlobalDataContract $globalData)
    {
    }

    public function getAdminMenu()
    {
        // dd($this->globalData->get('admin_menu', []));
        // dd(GlobalData::get('admin_menu'));
        return GlobalData::get('admin_menu');
    }
}
