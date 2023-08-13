<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColumnResource;
use App\Http\Resources\LocationResource;
use App\Models\Column;
use App\Models\Location;

class ColumnController extends Controller
{
    public function index()
    {
        return ColumnResource::collection(Column::query()->with(['locations'])->paginate());
    }

    public function locations()
    {
        return LocationResource::collection(Location::query()->with(['column'])->paginate());
    }
}
