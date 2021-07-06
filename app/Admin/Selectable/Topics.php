<?php

namespace App\Admin\Selectable;

use App\Models\Topic;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Topics extends Selectable
{
    public $model = Topic::class;
    protected $perPage = 9;

    public function make()
    {
        $this->column('id');
        $this->column('title');

        $this->filter(function (Filter $filter) {
            $filter->like('Title');
        });
    }
}