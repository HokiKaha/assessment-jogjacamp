<?php

namespace App\Services;

use App\Repositories\ApprovalStageRepository;

class ApprovalStageService
{
    protected $approvalStageRepository;

    public function __construct(ApprovalStageRepository $approvalStageRepository)
    {
        $this->approvalStageRepository = $approvalStageRepository;
    }

    public function createApprovalStage(array $data)
    {
        return $this->approvalStageRepository->createApprovalStage($data);
    }

    public function updateApprovalStage($id, array $data)
    {
        return $this->approvalStageRepository->updateApprovalStage($id, $data);
    }
}
