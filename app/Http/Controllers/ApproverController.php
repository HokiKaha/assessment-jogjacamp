<?php

namespace App\Http\Controllers;

use App\Services\ApproverService;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    protected $approverService;

    public function __construct(ApproverService $approverService)
    {
        $this->approverService = $approverService;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:approvers',
        ]);

        $approver = $this->approverService->createApprover($data);
        return response()->json($approver, 201);
    }
}
