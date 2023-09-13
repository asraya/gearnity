<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\VoucherDataTable;
use App\Http\Requests\Backend\Master\VoucherRequest;
use App\Repositories\BaseRepository;
use Ramsey\Uuid\Uuid;
use App\Models\Master\Voucher;
use Str;

class VoucherController extends Controller
{
        protected $voucher;
        public function __construct(Voucher $voucher)
        {
            $this->voucher = new BaseRepository($voucher);
            $voucher->id = Uuid::uuid4()->toString();
        }
    
        public function index(VoucherDataTable $datatable)
        {
            try {
                $data['model'] = $this->voucher->get();
                return $datatable->render('backend.master.voucher.index', compact('data'));  
            } catch (\Throwable $th) {
                return view('error.index',['message' => $th->getMessage()]);
            }
        }

        public function create()
        {
            return view('backend.master.voucher.create');
        }
    
        public function edit($id)
        {
            try {
                $data['voucher'] = $this->voucher->find($id);
                return view('backend.master.voucher.edit',compact('data'));
            } catch (\Throwable $th) {
               return view('error.index',['message' => $th->getMessage()]);
            }
        }

        public function update(VoucherRequest $request,$id)
        {
            try {
                $request->merge(['slug' => Str::slug($request->name)]);
                $this->voucher->update($id,$request->all());
                return redirect()->route('backend.master.voucher.index')->with('success',__('message.update'));
            } catch (\Throwable $th) {
               return view('error.index',['message' => $th->getMessage()]);
            }
        }
    
        public function store(VoucherRequest $request)
        {           
            try {
                $request->merge(['code_voucher' => Str::random(10)]);
                $this->voucher->store($request->all());
                return redirect()->route('backend.master.voucher.index')->with('success',__('message.store'));
            } catch (\Throwable $th) {
               return view('error.index',['message' => $th->getMessage()]);
            }
        }
    
}
