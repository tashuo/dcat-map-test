<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Form;
use App\Admin\Repositories\Location;

class FormController extends AdminController
{
    /**
     * 自定义地图模型
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function customMap()
    {
        return view('map');
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Location(), function (Form $form) {
            $form->html(view('coordinate'), '地区选择');
        });
    }
}
