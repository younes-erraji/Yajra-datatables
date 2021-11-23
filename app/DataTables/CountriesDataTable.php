<?php

namespace App\DataTables;

// use App\Models\CountriesDataTable;
use App\Models\Country;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CountriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
            // ->addColumn('action', 'countriesdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CountriesDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        // return $model->newQuery();
        $data = Country::select();
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('countries-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip') // Bfrtip
                    ->orderBy(0, 'asc') // Column index
                    ->buttons(
                        // Button::make('create'),

                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    )
                    ->parameters([
                        'lengthMenu' => [
                            [ 10, 25, 50, -1 ],
                            [ '10', '25', '50', 'All' ]
                        ],
                        'responsive' => true,
                        // 'dom' => 'Blfrtip',
                        // 'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
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
            // Column::computed('action')
            //       ->exportable(true)
            //       ->printable(true)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('id'),
            Column::make('country_name'),
            Column::make('capital_city'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Countries_' . date('YmdHis');
    }
}
