<?php

namespace App\Http\Controllers;

use App\Services\ApprovalStageService;
use Illuminate\Http\Request;

class ApprovalStageController extends Controller
{
    protected $approvalStageService;

    public function __construct(ApprovalStageService $approvalStageService)
    {
        $this->approvalStageService = $approvalStageService;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'approver_id' => 'required|exists:approvers,id|unique:approval_stages',
        ]);

        $stage = $this->approvalStageService->createApprovalStage($data);
        return response()->json($stage, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'approver_id' => 'required|exists:approvers,id|unique:approval_stages,approver_id,' . $id,
        ]);

        $stage = $this->approvalStageService->updateApprovalStage($id, $data);
        return response()->json($stage);
    }
}
