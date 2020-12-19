<?php

namespace App\Http\Controllers;

use App\Models\Account;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return Account::all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'validation' => $validator->getMessageBag()->toJson(),
            ], 422);
        }

        $account = Account::create($request->all());

        if ($account) {
            return response()->json([
                'message' => 'Account created successfully',
                'account_name' => $request->name,
                'account_id' => $account->id
            ], 201);
        } else {
            return response()->json([
                'message' => 'Account not created, please try again',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        if (!Account::where(['id' => request()->accountId])->exists()) {
            return response()->json([
                'message' => 'No account found',
                'validation' => 'The entered account id does not match any active accounts',
            ], 404);
        }
        $account = Account::find(request()->accountId);
        return $account->transactions()->get()->toJson();
    }
}
