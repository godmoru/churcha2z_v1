<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EloquentInterface\ExpenditureInterface as Repository;

class ExpenditureController extends AbstractController
{
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getLocationExpenses($location_id)
    {
        $param['pageName'] = "Location Expenditure";
        $param['expenses'] = $this->repository->allBy('location_id', $location_id);
    	return view('accounts.expenditures.locationexpenditure', $param);
    }

    public function approve($id) 
    {
        try {
            //code...
            $exp = $this->repository->byId($id);
            $exp->status = 1;
            $exp->save();
            flash()->success('expenditure for the selected month added successful');
            return redirect()->back();
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->except('_token');
            $data['submitted_by'] = auth()->user()->id;
            $data['location_id'] = auth()->user()->location_id;
            if($data['amount'] > $data['current_total']){
                throw new \Exception("Requested amount can not be grteater than available amount for this selected month. available balance for this month is ". number_format($data['current_total'],2));
            }
            $this->repository->createNew($data);
            flash()->success('expenditure for the selected month added successful');
            return redirect()->back();
        }catch(\Exception $e){
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
