<?php

namespace App\Admin\Controllers;

use App\Models\Topic;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TopicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Topic';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Topic());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Заголовок'));
        $grid->column('user.name', __('Автор'));
        $grid->column('slug', __('Слаг'));
        $grid->column('is_published', __('Опубликован?'))->bool();
        $grid->column('published_at', __('Дата публикации'));
        $grid->column('created_at', __('Дата создания'));
        $grid->column('updated_at', __('Дата обновления'));
        $grid->column('deleted_at', __('Дата удаления'));

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
        $show = new Show(Topic::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Заголовок'));
        $show->field('description', __('Описание'));
        $show->user('Информация об авторе', function ($user) {
            $user->setResource('/admin/users');
        
            $user->id();
            $user->name();
            $user->email();
        });
        $show->field('user.name', __('Автор'));
        $show->field('slug', __('Слаг'));
        $show->field('is_published', __('Опубликован?'));
        $show->field('published_at', __('Дата публикации'));
        $show->field('created_at', __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));
        $show->field('deleted_at', __('Дата удаления'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Topic());

        $form->text('title', __('Заголовок'));
        $form->textarea('description', __('Описание'));
        $form->text('slug', __('Слаг'));
        $form->switch('is_published', __('Опубликован?'));
        $form->datetime('published_at', __('Дата публикации'))->default(date('Y-m-d H:i:s'));
        $form->select('user_id','Автор')->options(User::all()->pluck('name','id'));

        return $form;
    }
}
