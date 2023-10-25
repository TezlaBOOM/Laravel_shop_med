<?php

namespace App\DataTables;

use App\Models\mail_list;
use App\Models\subscriberlist;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;

class SubscriberListDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('show', function($query){
            $showBtn = "<a href='".route('admin.subscribers.show',$query->id)."' class='btn btn-primary'><i class='far fa-eye'></i></a>";

            return $showBtn;
        })
        ->addColumn('Admin', function($query){
            // dd($query->userlist->name);
            return $query->user->email;
        })
            ->addColumn('Data', function($query){
                return date('d-M-Y', strtotime($query->created_at));
            })
            ->addColumn('subscriberlist.action','Admin','Data','show')
            ->rawColumns(['show'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(mail_list $model): QueryBuilder
    {
        return $model->whereIn('action', ['newsletter', 'pricelist'])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('subscriberlist-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
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
            Column::make('action'),
            Column::make('title'),
            Column::make('Data'),
            Column::make('Admin'),
            Column::computed('show')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubscriberList_' . date('YmdHis');
    }
}
