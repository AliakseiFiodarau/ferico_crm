<?php

declare(strict_types=1);

namespace App\DataTables;

use App\Models\Company as Model;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn(Model::COLUMN_LOGO, function ($data){
                $logo = $data->logo;
                return $logo ? "<img src=/storage/images/logo/$logo width='50' height='50'>" : null;
            })
            ->addColumn('action', 'companies.action')
            ->rawColumns(['logo', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Model $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('company-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
                        Button::make('excel'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make(Model::COLUMN_LOGO)->title(__("Logo")),
            Column::make(Model::COLUMN_NAME)->title(__("Name")),
            Column::make(Model::COLUMN_EMAIL)->title(__("Email")),
            Column::make(Model::COLUMN_URL)->title(__("Website")),
            Column::make(Model::COLUMN_PHONE)->title(__("Phone")),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title(__("Action"))
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Company_' . date('YmdHis');
    }
}
