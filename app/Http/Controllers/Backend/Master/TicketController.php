<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\Master\TicketDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Master\TicketRequest;
use App\Models\Master\Ticket;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TicketController extends Controller
{
    protected $ticket;
    public function __construct(Ticket $ticket)
    {
        $this->ticket = new BaseRepository($ticket);
        $ticket->id = Uuid::uuid4()->toString();
    }

    public function index(TicketDataTable $datatable)
    {
        try {
            return $datatable->render('backend.master.ticket.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $data['ticket'] = $this->ticket->find($id);
            return view('backend.master.ticket.show',compact('data'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
      
    }
}