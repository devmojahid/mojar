<?php

namespace Modules\Backend\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Facades\HookAction;
use Modules\Core\Traits\ResponseMessage;

class BackendController extends Controller
{
    use ResponseMessage;

    public function callAction($method, $parameters)
    {
        HookAction::addAdminMenu(
            "new Menu Test 2",
            'menu-test-1',
            [
                'icon' => 'fa fa-file',
                'position' => 1,
            ]
        );

        return parent::callAction($method, $parameters);
    }
}
