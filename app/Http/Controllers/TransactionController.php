<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'validation' => $validator->getMessageBag()->toJson(),
            ], 422);
        }

        if(!Account::where(['id' => request()->accountId])->exists()) {
            return response()->json([
                'message' => 'No account found',
                'validation' => 'The entered account id does not match any active accounts',
            ], 404);
        }

        if (Transaction::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'account_id' => request()->accountId,
        ])) {
            return response()->json([
                'message' => 'Transaction created successfully',
                'transaction' => [
                    'description' => $request->description,
                    'amount' => $request->amount,
                ],
            ], 201);
        } else {
            return response()->json([
                'message' => 'Could not create transaction, please try again',
            ], 409);
        }
    }
}
