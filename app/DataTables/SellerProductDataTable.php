<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $editBtn ="<a href='".route('admin.product.edit',$query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
            $delBtn ="<a href='".route('admin.product.destroy',$query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
            $moreBtn = '<div class="dropdown dropleft d-inline">
            <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item has-icon" href="'.route('admin.product-image-gallery.index', ['product' => $query->id]).'"><i class="far fa-heart"></i> Galeria obrazów</a>
              <a class="dropdown-item has-icon" href="'.route('admin.product-variant.index', ['product' => $query->id]).'"><i class="far fa-file"></i> Warianty</a>
            </div>
          </div>';

            return $editBtn.$delBtn.$moreBtn;
        })

        ->addColumn('status', function($query){
            if($query->status==1){
                $button= '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                <span class="custom-switch-indicator"></span>
                <label>';
            } else {
                $button= '<label class="custom-switch mt-2">
                <input type="checkbox"  name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                <span class="custom-switch-indicator"></span>
                <label>';
            }

            return $button;
        })
        ->addColumn('thumb_image', function($query){
            return  $img="<img width='50px' src='".asset($query->thumb_image)."'></img>";
          })
          ->addColumn('type', function($query){
            switch ($query->product_type){
                case 'new_arrival':
                return '<i class="badge badge-success">Nowość</i>';
                break;

                case 'featured_product':
                return '<i class="badge badge-success">Wyróżniony</i>';
                break;
                case 'top_product':
                return '<i class="badge badge-success">Top produkt</i>';
                break;
                case 'best_product':
                return '<i class="badge badge-success">Bestseller</i>';
                break;

                default:
                return '<i class="badge badge-dark">Unknown</i>';
                break;

            }
          })
          ->addColumn('backorder', function($query){
            switch ($query->backorder){
                case 0:
                return '<i class="badge badge-success">Na zamówienie</i>';
                break;

                case 1:
                return '<i class="badge badge-danger">wycofane</i>';
                break;
                case 2:
                return '<i class="badge badge-success">4 dni</i>';
                break;
                case 3:
                return '<i class="badge badge-success">7 dni</i>';
                break;
                case 4:
                return '<i class="badge badge-success">14 dni</i>';
                break;

                default:
                return '<i class="badge badge-dark">Unknown</i>';
                break;

            }
          })
          ->addColumn('vendor', function($query){
            return $query->vendor->shop_name;
          })
          ->addColumn('approve', function($query){
            return "<select class='form-control is_approve' data-id='$query->id'>
            <option selected value='0'>Oczekujące</option>
            <option value='1'>Zatwierdzone</option>
            </select>";
          })

        ->rawColumns(['status','action','thumb_image','type','backorder','approve'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id','!=',Auth::user()->vendor->id)
        ->where('is_approved',1)
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerproduct-table')
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
            Column::make('id')->width(50),
            Column::make('vendor'),
            Column::make('thumb_image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('qty'),
            Column::make('backorder'),
            Column::make('type'),
            Column::make('approve')->width(100),
            Column::make('status')->width(100),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerProduct_' . date('YmdHis');
    }
}