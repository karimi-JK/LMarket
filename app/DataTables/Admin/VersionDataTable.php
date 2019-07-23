<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Version;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class VersionDataTable extends DataTable
{
	
	public $product_id;
	
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.versions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Version $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Version $model)
    {
        return $model->newQuery()->join('products', 'versions.product_id', '=', 'products.id')								
								->select('versions.*', 'products.product_name')
								->where("product_id",$this->product_id);
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
            'product_name'=>['title' => 'Product'],
            'version',
            'apk',
            'version_price'=>['title' => 'Price'],
            'compony',
            'visited',
            'downloaded',
            //'change',
            //'description',
            //'requirements',
            'state',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'versionsdatatable_' . time();
    }
}
