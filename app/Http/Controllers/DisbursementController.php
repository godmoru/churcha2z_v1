<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EloquentInterface\DisbursementInterface as Repository;

class DisbursementController extends AbstractController
{
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function create(Request $request)
    {
        try{
            $data = $request->except('_token');
            $data['user_id'] = auth()->user()->id;
            $data['location_id'] = auth()->user()->location_id;
            $data['amount'] = $data['type'] == 'branch' ? $data['branch_income'] : $data['hq_income'];
            $check = $this->repository->getFirstBy('teller_number',$data['teller_number']);
            if($check) {
                $data['id'] = $check->id;
                $this->repository->update($data);
            }else{
                $this->repository->create($data);
            }
            flash()->success('disbursement successful');
            return redirect()->back();
        }catch(\Exception $e){
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
