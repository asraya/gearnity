<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\RewardDataTable;
use App\Http\Requests\Backend\Master\RewardRequest;
use App\Repositories\BaseRepository;
use Str;
use Ramsey\Uuid\Uuid;
use App\Models\Master\Reward;

class RewardController extends Controller
{

    protected $reward;
    public function __construct(Reward $reward)
    {
        $this->reward = new BaseRepository($reward);
        $reward->id = Uuid::uuid4()->toString();
    }

    public function index(RewardDataTable $datatable)
    {
        try {
            $data['model'] = $this->reward->get();

            return $datatable->render('backend.master.reward.index', compact('data'));

        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        return view('backend.master.reward.create');
    }

    public function edit($id)
    {
        try {
            $data['reward'] = $this->reward->find($id);
            return view('backend.master.reward.edit',compact('data'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
      
    }

    public function update(RewardRequest $request,$id)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->reward->update($id,$request->all());
            return redirect()->route('backend.master.reward.index')->with('success',__('message.update'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(RewardRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:mitras,name',
        ]);
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->reward->store($request->all(),true,['image'],'mitra/logo');

            return redirect()->route('backend.master.reward.index')->with('success',__('message.store'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->reward->delete($id);
            return redirect()->route('backend.master.reward.index')->with('success',__('message.delete'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
