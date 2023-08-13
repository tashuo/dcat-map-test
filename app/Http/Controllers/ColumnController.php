<?php

namespace App\Http\Controllers;

use App\Models\Column;

class ColumnController extends Controller
{
    public function index()
    {
        return Column::query()->with(['locations'])->paginate();
    }
}
