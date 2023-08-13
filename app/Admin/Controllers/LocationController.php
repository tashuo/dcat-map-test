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
//            $form->hidden('location');
//            $latitude = 'latitude';
//            $longitude = 'longitude';
//            $form->map($latitude, $longitude, '位置');
            $form->html(view('coordinate'), '区域选择'); // 加载自定义地图
            $form->hidden('location', '坐标点'); // 隐藏域，用于接收坐标点（这里如果想数据回填可以，->value('49.121221,132.2321312')）
            $form->hidden('address', '详细位置'); // 隐藏域，用于接收详细点位地址
//            $form->hidden('address');
            $form->select('column_id', '专栏')
                ->options(
                    Column::all()->pluck('name', 'id')
                )->required();

            $form->display('created_at');
            $form->display('updated_at');
//            $form->saving(function (Form $form) {
//                $form->location = "{$form->latitude},{$form->longitude}";
//                $form->address = '测试';
//                unset($form->latitude, $form->longitude);
//            });
        });
    }
}
