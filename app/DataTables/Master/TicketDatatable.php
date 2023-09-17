<?php

namespace App\DataTables\Master;

use App\Models\Master\Ticket;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TicketDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data','query'))->render();
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function actions($id)
    {
        return  [
            [
                'title' => 'Hapus',
                'icon' => 'bi bi-trash',
                'route' => route('backend.master.ticket.delete',$id),
                'type' => 'delete',
            ],
            [
                'title' => 'Edit',
                'icon' => 'bi bi-pen',
                'route' => route('backend.master.ticket.show',$id),
                'type' => '',
            ],
        ];
    }

   public function query(Ticket $model): QueryBuilder
   {
    return $model->newQuery()
    ->OrderBy('id','desc');
}


    public function html()
    {
        return $this->builder()
            ->setTableId('ticket-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('ticket')->title(__('field.ticket_ticket'))->orderable(false),
            Column::make('status')->title(__('field.ticket_status'))->orderable(false),
            Column::make('image')->title(__('field.ticket_image'))->orderable(false),

            Column::make('action')->title(__('field.action'))->orderable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
