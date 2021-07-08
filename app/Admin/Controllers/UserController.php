<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Имя'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Дата подтверждения Email'));
        $grid->column('created_at', __('Дата создания'));
        $grid->column('updated_at', __('Дата обновления'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Имя'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Дата подтверждения Email'));
        $show->field('created_at', __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Имя'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Дата подтверждения Email'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Пароль'));

        return $form;
    }
}
