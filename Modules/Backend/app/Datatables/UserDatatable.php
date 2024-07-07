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
            'avatar' =>  [
                'label' => "avatar",
                'width' => '5%'
            ],
            'name' => [
                'label' => "Name",
                'formatter' => [$this, 'rowActionFormatter']
            ],
            'email' => [
                'label' => "Email",
                'width' => '15%',
                'align' => 'center'
            ],
        ];
    }
}
