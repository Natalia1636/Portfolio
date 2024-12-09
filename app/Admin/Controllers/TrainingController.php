<?php

namespace App\Admin\Controllers;

use App\Models\Experience;
use App\Models\Technology;
use App\Models\Training;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TrainingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Training controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Training);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Название'))->sortable();
        $grid->column('qualification', __('Квалификация'))->sortable();
        $grid->column('programme_name', __('Программа'))->sortable();
        $grid->column('date_from', __('Дата от'))->sortable()->date();
        $grid->column('date_to', __('Дата до'))->sortable()->date();

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
        $show = new Show(Training::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Название'));
        $show->field('qualification', __('Квалификация'));
        $show->field('programme_name', __('Программа'));
        $show->field('date_from', __('Дата от'));
        $show->field('date_to', __('Дата до'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Training);

        $form->display('id', __('ID'));
        $form->text('title', __('Название'));
        $form->text('qualification', __('Квалификация'));
        $form->text('programme_name', __('Программа'));
        $form->date('date_from', __('Дата от'));
        $form->date('date_to', __('Дата до'));

        return $form;
    }
}
