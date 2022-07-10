<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'personId' => 'unique:accounts|min:11'
        ]);

        $account = new Account;

        $account->accNr = $account->accountNumber();
        $account->name = $request->name;
        $account->surname = $request->surname;
        $account->personId = $request->personId;
        $account->sum = 0;

        $account->save();
        return redirect()->route('accounts-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $deductError = 'There are insufficient funds in the account or an incorrect amount has been entered!';
        if($account->sum < $request->deductFunds) {
           return $deductError;
        }
        $account->sum += $request->addFunds;
        $account->sum -= $request->deductFunds;
        $account->save();
        return redirect()->route('accounts-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if($account->sum > 0) {
            return 'An account containing money cannot be deleted!';
        }
        $account->delete();
        return redirect()->route('accounts-index');
    }

    
}
