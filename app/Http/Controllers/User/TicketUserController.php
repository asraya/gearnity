<?php

namespace App\Http\Controllers\User;

use App\DataTables\user\TicketDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\TicketUserRequest;
use App\Models\Master\Ticket;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TicketUserController extends Controller
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
            $data['ticket'] = $this->ticket->Query()->where('user_id',auth()->user()->id)->get();
            return $datatable->render('user.ticket.index',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create(TicketDataTable $datatable)
    {
        try {
            $data['ticket'] = $this->ticket->get();
            return view('user.ticket.create',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(TicketUserRequest $request)
    {
        try {
            $request->merge(['user_id' => auth()->user()->id]);
            $request->merge(['slug' => Str::slug($request->title)]);
            $this->ticket->store($request->all(),true,['image'],'mitra/logo');
            return redirect()->route('frontend.user.ticket.index')->with('success',__('message.store'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }
}