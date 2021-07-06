<?php

namespace App\Admin\Controllers;

use App\Models\Comment;
use App\User;
use App\Models\Topic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Selectable\Users;
use App\Admin\Selectable\Topics;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment());

        $grid->column('id', __('Id'));
        $grid->column('topic.title', __('Тема'));
        $grid->column('is_published', __('Опубликован?'))->bool();
        $grid->column('published_at', __('Дата публикации'));
        $grid->column('deleted_at', __('Дата удаления'));
        $grid->column('created_at', __('Дата создания'));
        $grid->column('updated_at', __('Дата обновления'));

        $grid->filter(function($filter){

            $filter->ilike('topic.title', 'Тема');
        
        });

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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name', __('User id'));
        $show->field('topic.title', __('Topic id'));
        $show->field('content', __('Content'));
        $show->field('is_published', __('Is published'));
        $show->field('published_at', __('Published at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->user('Информация об авторе', function ($user) {
            $user->setResource('/admin/users');
        
            $user->id();
            $user->name();
            $user->email();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment());

        $form->belongsTo('topic_id', Topics::class,'Тема');
        $form->textarea('content', __('Content'));
        $form->switch('is_published', __('Is published'));
        $form->datetime('published_at', __('Published at'))->default(date('Y-m-d H:i:s'));
        $form->belongsTo('user_id', Users::class,'Автор');

        return $form;
    }
}
