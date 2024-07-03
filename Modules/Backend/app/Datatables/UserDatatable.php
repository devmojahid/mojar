<?php

namespace Modules\Backend\Datatables;

use Modules\Core\Abstracts\DataTable;

class UserDatatable extends DataTable
{
    public function query($data)
    {
        //
    }

    public function columns()
    {
        return [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ];
    }
}
