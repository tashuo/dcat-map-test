<?php
namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * 自定义分页返回
 * Class CustomLengthAwarePaginator
 * @package App\Services
 */
class CustomLengthAwarePaginator extends LengthAwarePaginator
{
    public function toArray()
    {
        return [
            'data' => $this->items->toArray(),
            'meta' => [
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'total' => $this->total(),
                'per_page' => $this->perPage(),
            ],
        ];
    }
}
