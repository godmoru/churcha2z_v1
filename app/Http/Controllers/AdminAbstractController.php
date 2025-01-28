<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

abstract class AdminAbstractController extends Controller
{

    protected $repository;
    public function __construct($repository = null)
    {
        $this->middleware(['auth', 'administrator']);
        $this->repository = $repository;
    }

    public function index()
    {
        $data['datas'] = $this->repository->all();
        $data['success'] = true;
        return response()->json($data, 200);
    }

    public function destroy($model)
    {
        try {
            $this->repository->delete($model);
            return response()->json(['message' => 'data deleted successfully','success' => true], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true
            ], 400);
        }

    }
}
