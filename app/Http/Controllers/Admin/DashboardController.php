<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class DashboardController extends Controller
{
    public function index(Content $content)
    {
        return $content->title("仪表盘")
            ->row(function (Row $row) {

                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
