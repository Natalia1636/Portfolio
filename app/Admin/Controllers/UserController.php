<?php

namespace App\Admin\Controllers;

use App\Models\User;
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
    protected $title = 'User controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Имя'))->sortable();
        $grid->column('surname', __('Фамилия'))->sortable();
        $grid->column('position', __('Должность'))->sortable();
        $grid->column('description', __('Описание'))->sortable();
        $grid->column('interests', __('Интересы'))->sortable();
        $grid->column('image', __('Фото'))->sortable()->image('/storage/');
        $grid->column('linkedin', __('linkedin'))->sortable();
        $grid->column('telegram', __('telegram'))->sortable();
        $grid->column('gitlab', __('gitlab'))->sortable();
        $grid->column('github', __('github'))->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Имя'));
        $show->field('surname', __('Фамилия'));
        $show->field('position', __('Должность'));
        $show->field('description', __('Описание'));
        $show->field('interests', __('Интересы'));
        $show->field('image', __('Фото'))->image('/storage/');
        $show->field('linkedin', __('linkedin'));
        $show->field('telegram', __('telegram'));
        $show->field('gitlab', __('gitlab'));
        $show->field('github', __('github'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->display('id', __('ID'));
        $form->text('name', __('Имя'));
        $form->text('surname', __('Фамилия'));
        $form->text('position', __('Должность'));
        $form->textarea('description', __('Описание'));
        $form->textarea('interests', __('Интересы'));
        $form->image('image', __('Фото'));
        $form->text('linkedin', __('linkedin'));
        $form->text('telegram', __('telegram'));
        $form->text('gitlab', __('gitlab'));
        $form->text('github', __('github'));

        return $form;
    }
}
