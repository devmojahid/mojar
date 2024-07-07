<?php

namespace Modules\Backend\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Modules\Backend\Datatables\UserDatatable;
use Modules\Backend\Http\Controllers\BackendController;
use Modules\Core\Abstracts\DataTable;
use Modules\Core\Models\User;

class UserController extends BackendController
{


    /**
     * Get Model resource
     * 
     * @param mixed $...params
     * 
     * @return string
     */

    protected function getModel(...$params): string
    {
        return User::class;
    }

    /**
     * Get title resource
     * 
     * @param mixed $...params
     * 
     * @return string
     */

    protected function getTitle(...$params): string
    {
        return 'User';
    }

    /**
     * Get data table resource
     *
     * @param mixed ...$params
     * @return UserDatatable|DataTable
     */
    protected function getDataTable(...$params): UserDatatable|DataTable
    {
        return new UserDatatable();
    }
}