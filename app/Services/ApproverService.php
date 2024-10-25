<?php

namespace App\Services;

use App\Repositories\ApproverRepository;

class ApproverService
{
    protected $approverRepository;

    public function __construct(ApproverRepository $approverRepository)
    {
        $this->approverRepository = $approverRepository;
    }

    public function createApprover(array $data)
    {
        return $this->approverRepository->createApprover($data);
    }
}
