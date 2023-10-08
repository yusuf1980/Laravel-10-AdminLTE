<?php

namespace App\DataTables;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('featured_image', function ($row) {
                $img = 'no image';
                if ($row->image) {
                    $url = asset('/images/posts/' . $row->image);
                    $img = '<img src="' . $url . '" width="100" align="center" >';
                }
                return $img;
            })
            ->addColumn('action', function ($row) {
                $updateButton = "<a href='" . route('posts.edit', $row->id) . "' class='btn btn-sm btn-info'><i class='fas fa-pen'></i></a>";
                $deleteButton = "<form method='post' class='d-inline' action='" . route('posts.destroy', [$row->id]) . "'>
                    <input type='hidden' name='_token' value='" . csrf_token() . "'>
                    <input type='hidden' name='_method' value='DELETE'>
                    <button type='submit' onclick='btnDelete()'
                        class='btn btn-danger btn-sm'>Del</button>
                    </form>";
                return $updateButton . " " . $deleteButton;

            })
            ->addColumn('category', function ($row) {
                return $row->category->name;
            })
            ->addColumn('status', function ($row) {
                if ($row->published)
                    return 'Published';
                else
                    return 'Draft';
            })
            ->rawColumns(['action', 'featured_image']);
        // ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('posts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy([0, 'desc'])
            ->selectStyleSingle()
        ;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::computed('featured_image')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
            Column::make('title'),
            Column::computed('status'),
            Column::computed('category'),
            Column::make('published_date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Posts_' . date('YmdHis');
    }
}
