<?php

namespace App\Admin\Controllers;

use App\CountyImport;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CountyImportController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'County Import';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CountyImport);

        $grid->column('id', __('Id'));
        $grid->column('file', __('File'));

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
        $show = new Show(CountyImport::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('file', __('File'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CountyImport);

        $form->file('file', 'File')->setWidth(2,2)->rules('required|max:2048')
            ->options(['maxFileSize' => 2048, 'allowedFileExtensions' => ["xls", "xlsx", "csv"], 'showPreview' => false])->help('File formats: xls,xlsx,csv');

        return $form;
    }
}
