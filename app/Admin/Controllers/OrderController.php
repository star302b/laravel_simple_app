<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order);

        $grid->column('id', __('Id'));
        $grid->column('entity_name', __('Entity name'));
        $grid->column('entity_ending', __('Entity ending'));
        $grid->column('service', __('Service'));
        $grid->column('service_type', __('Service Type'));
        $grid->column('county', __('County'));
        $grid->column('promo', __('Promo'));
        $grid->column('created_at', __('Created at'));

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('entity_name', __('Entity name'));
        $show->field('entity_ending', __('Entity ending'));
        $show->field('county', __('County'));
        $show->field('promo', __('Promo'));
        $show->field('data', __('Data'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order);

        $form->text('service', __('Service'));
        $form->text('service_type', __('Service Type'));
        $form->text('entity_name', __('Entity name'));
        $form->text('entity_ending', __('Entity ending'));
        $form->text('county', __('County'));
        $form->text('promo', __('Promo'));
        $form->textarea('data', __('Data'));

        return $form;
    }
}
