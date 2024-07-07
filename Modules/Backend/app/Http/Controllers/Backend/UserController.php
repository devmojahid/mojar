<?php

namespace Modules\Backend\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Modules\Backend\Datatables\UserDatatable;
use Modules\Backend\Http\Controllers\BackendController;
use Modules\Core\Abstracts\DataTable;

class UserController extends BackendController
{
    protected function getDataTable(...$params): UserDatatable|DataTable
    {
        return new UserDatatable();
    }
}
