<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Location;
use App\Models\Column;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class LocationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Location(['column']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('location');
            $grid->column('address');
            $grid->column('column.name', '专栏');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Location(), function (Show $show) {
            $show->field('id');
            $show->field('location');
            $show->field('address');
            $show->field('column_id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Location(), function (Form $form) {
            $form->display('id');
//            $form->text('location');
            $form->map('', '', 'location');
            $form->text('address');
            $form->select('column_id', '专栏')
                ->options(
                    Column::all()->pluck('name', 'id')
                )->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
