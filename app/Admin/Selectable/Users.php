<?php

namespace App\Admin\Selectable;

use App\User;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Users extends Selectable
{
    /**
     * Model of list for select.
     *
     * @var string
     */
    public $model = User::class;

    /**
     * Data of list. Default 10.
     *
     * @var integer
     */
    protected $perPage = 9;
    
    /**
     * @return Grid
     */
    public function make()
    {
        $this->column('id');
        $this->column('name');
        $this->column('email');
        $this->column('created_at');

        $this->filter(function (Filter $filter) {
            $filter->like('name');
        });
    }
}