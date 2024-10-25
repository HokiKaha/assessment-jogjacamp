<?php

namespace App\Services;

use App\Repositories\ExpenseRepository;
use App\Models\Status;

class ExpenseService
{
    protected $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function createExpense(array $data)
    {
        return $this->expenseRepository->createExpense($data);
    }

    public function approveExpense($expenseId, $approverId)
    {
        $expense = $this->expenseRepository->findExpense($expenseId);

        if (!$expense) {
            return null;
        }

        $currentStage = $expense->approvals()->where('approver_id', $approverId)->first();
        if (!$currentStage || $expense->status->name === 'disetujui') {
            return null;
        }

        $this->expenseRepository->updateApproval($currentStage, Status::where('name', 'disetujui')->first()->id);

        if ($this->expenseRepository->isFullyApproved($expense)) {
            $this->expenseRepository->updateExpenseStatus($expense, Status::where('name', 'disetujui')->first()->id);
        }

        return $expense;
    }
}
