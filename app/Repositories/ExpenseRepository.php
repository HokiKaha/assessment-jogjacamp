<?php

namespace App\Repositories;

use App\Models\Expense;
use App\Models\Approval;
use App\Models\Status;

class ExpenseRepository
{
    public function findExpense($expenseId)
    {
        return Expense::with('approvals')->find($expenseId);
    }

    public function createExpense(array $data)
    {
        return Expense::create($data);
    }

    public function updateApproval($approvalStage, $statusId)
    {
        $approvalStage->status_id = $statusId;
        $approvalStage->save();
    }

    public function isFullyApproved($expense)
    {
        // Cek apakah semua approval stages telah disetujui
        return $expense->approvals()->where('status_id', '!=', Status::where('name', 'disetujui')->first()->id)->doesntExist();
    }

    public function updateExpenseStatus($expense, $statusId)
    {
        $expense->status_id = $statusId;
        $expense->save();
    }
}
