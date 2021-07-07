<?php

namespace App\Admin\Selectable;

use App\Models\Topic;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Topics extends Selectable
{
    /**
     * Model of list for select.
     *
     * @var string
     */
    public $model = Topic::class;

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
        $this->column('title');

        $this->filter(function (Filter $filter) {
            $filter->like('Title');
        });
    }
}