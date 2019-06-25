<?php

namespace App\Admin\Controllers;

use App\CountyPrice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CountyPricesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'County Prices';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CountyPrice);

        $grid->column('id', __('Id'));
        $grid->column('county_name', __('County name'));
        $grid->column('price', __('Price'));
        $grid->column('county_type', __('County type'));

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
        $show = new Show(CountyPrice::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('county_name', __('County name'));
        $show->field('price', __('Price'));
        $show->field('county_type', __('County type'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CountyPrice);

        $form->textarea('county_name', __('County name'));
        $form->number('price', __('Price'));
        $form->switch('county_type', __('County type'));

        return $form;
    }
}
