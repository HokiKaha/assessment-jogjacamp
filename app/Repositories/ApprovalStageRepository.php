<?php

namespace App\Repositories;

use App\Models\ApprovalStage;

class ApprovalStageRepository
{
    public function createApprovalStage(array $data)
    {
        return ApprovalStage::create($data);
    }

    public function updateApprovalStage($id, array $data)
    {
        $stage = ApprovalStage::findOrFail($id);
        $stage->update($data);
        return $stage;
    }
}
