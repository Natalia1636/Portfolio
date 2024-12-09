<?php

namespace App\Admin\Controllers;

use App\Models\Experience;
use App\Models\Technology;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExperienceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Experience controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Experience);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('position', __('Должность'))->sortable();
        $grid->column('short_description', __('Краткое описание'))->sortable();
        $grid->column('date_from', __('Дата от'))->sortable()->date();
        $grid->column('date_to', __('Дата до'))->sortable()->date();
        $grid->column('company_name', __('Компания'))->sortable();
        $grid->technologies()->display(function ($technologies) {

            $technologies = array_map(function ($technology) {
                return "<span class='label label-success'>{$technology['title']}</span>";
            }, $technologies);

            return join('&nbsp;', $technologies);
        });

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
        $show = new Show(Experience::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('position', __('Должность'));
        $show->field('short_description', __('Краткое описание'));
        $show->field('date_from', __('Дата от'));
        $show->field('date_to', __('Дата до'));
        $show->field('company_name', __('Компания'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Experience);

        $form->display('id', __('ID'));
        $form->text('position', __('Должность'));
        $form->textarea('short_description', __('Краткое описание'));
        $form->date('date_from', __('Дата от'));
        $form->date('date_to', __('Дата до'));
        $form->text('company_name', __('Компания'));
        $form->multipleSelect('technologies','Технологии')
            ->options(Technology::all()->pluck('title','id'));

        return $form;
    }
}
