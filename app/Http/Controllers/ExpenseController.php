<?php

namespace App\Http\Controllers;

use App\Services\ExpenseService;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    /**
     * @OA\Post(
     *     path="/expenses",
     *     @OA\Response(response="200", description="Create Expense")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|integer|min:1',
        ]);

        $expense = $this->expenseService->createExpense($data);
        return response()->json($expense, 201);
    }

    /**
     * @OA\Patch(
     *     path="/expenses/{id}/approve",
     *     @OA\Response(response="200", description="Approve Expense")
     * )
     */
    public function approve(Request $request, $id)
    {
        $data = $request->validate([
            'approver_id' => 'required|exists:approvers,id',
        ]);

        $expense = $this->expenseService->approveExpense($id, $data['approver_id']);

        if (!$expense) {
            return response()->json(['message' => 'Approval tidak valid'], 400);
        }

        return response()->json($expense);
    }

    /**
     * @OA\Get(
     *     path="/expenses/{id}",
     *     @OA\Response(response="200", description="Get Expense Details")
     * )
     */
    // public function show($id): JsonResponse
    // {
    //     $expense = $this->expenseService->getExpense($id);
    //     return response()->json($expense);
    // }
}
