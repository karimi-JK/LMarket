<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Resaler;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ResalerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.resalers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Resaler $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Resaler $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
			'avatar'=> ['title' => 'Avatar','data' => 'avatar', 'render' => '"<img src=\""+"'.url("/")."/images/resaler/".'"+data+"\" onclick=\"\"  class=\"avatar-image\" height=\"50\"/>"'],
            'name',
            'company',
            'email',            
            'last_acc',
            'policy',
            'state',
            //'activate_code',
            'mobile',
            //'password'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'resalersdatatable_' . time();
    }
}
