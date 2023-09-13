<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\RewardDataTable;
use App\Http\Requests\Backend\Master\RewardRequest;
use App\Repositories\BaseRepository;
use Str;
use Ramsey\Uuid\Uuid;
use App\Models\Master\Reward;

class RewardUserController extends Controller
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

            return $datatable->render('user.reward.index', compact('data'));

        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

}
