<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tools\CountyDownloadLink;
use App\CountyPromoCode;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CountyPromoCodeController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('County Promo Codes')
            ->description(' ')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit County Promo Code')
            ->description(' ')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create County Promo Code')
            ->description(' ')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CountyPromoCode);

        $grid->id('Id');
        $grid->promo_code('Promo code');
        $grid->activate('Activate');
        $grid->client_name('Client Name');
        $grid->notes('Notes');
        $grid->expiration_time('Expires date');

        $grid->actions(function ($actions) {
            $actions->disableView();

//            http://usacorp.loc/uploads/files/county_promo_template.xlsx

        });

        $grid->tools(function ($tools) {
            $tools->append(new CountyDownloadLink());
        });

        $grid->disableFilter();

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
        $show = new Show(CountyPromoCode::findOrFail($id));

        $show->id('Id');
        $show->promo_code('Promo code');
        $show->file('File');
        $show->activate('Activate');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CountyPromoCode);

        $form->text('promo_code', 'Promo code')->rules(function ($form) {
            $rules = 'required|unique:county_promo_codes,promo_code';
            if ($id = $form->model()->id) {
                $rules .= ',' . $id;
            }
            return $rules;
        });
        $form->text('client_name','Client Name');
        $form->text('notes','Notes');
        $form->file('file', 'File')->setWidth(2,2)->rules('required|max:2048')
            ->options(['maxFileSize' => 2048, 'allowedFileExtensions' => ["xls", "xlsx", "csv"], 'showPreview' => false])->help('File formats: xls,xlsx,csv');
        $form->switch('activate', 'Activate')->default(1);
        $form->datetime('expiration_time','Expiration time')->default(Carbon::now());

        $form->disableReset();
        $form->disableViewCheck();
        $form->disableEditingCheck();

        return $form;
    }
}
