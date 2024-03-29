<?php

namespace Modules\Wings\Http\Controllers;

use App\Events\TeamEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Modules\Wings\Jobs\AccountJob;
use Illuminate\Contracts\Support\Renderable;
use Modules\Wings\Entities\WingsPanelAccount;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $accounts = WingsPanelAccount::where('team_id', session('team_id'))->where('status', 'created')->get();
        return view('wings::accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('wings::accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        canFail('wings.accounts.edit');

        $request->validate([
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'username' => 'required|alpha_num|unique:wings_panel_accounts',
            'email' => 'required|unique:wings_panel_accounts',
            'password' => 'required|max:255'
        ]);

        $request->username = Str::lower($request->username);

        $accounts = new WingsPanelAccount();
        $accounts->email = $request->email;
        $accounts->username = $request->username;
        $accounts->first_name = $request->first_name;
        $accounts->last_name = $request->last_name;
        $accounts->team_id = session('team_id');
        $accounts->save();

        broadcast(new TeamEvent(
            $accounts->team_id,
            [
                'type' => 'wings.accounts.pending',
                'status' => 'pending'
            ]
        ));

        $data = $request->toArray();
        $data['team_id'] = $accounts->team_id;
        $data['type'] = 'create';

        dispatch(new AccountJob($accounts->id, $data));

        return response()->json(['status' => 1, 'data' => $data]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(WingsPanelAccount $account)
    {
        userInTeamFail($account->team_id);
        $user = $account;
        return view('wings::accounts.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('wings::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, WingsPanelAccount $account)
    {
        userInTeamFail($account->team_id);

        $request->validate([
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'username' => ['required', 'alpha_num', Rule::unique('wings_panel_accounts')->ignore($account->id)],
            'email' => ['required', Rule::unique('wings_panel_accounts')->ignore($account->id)],
            'password' => 'max:255'
        ]);

        $request->username = Str::lower($request->username);

        broadcast(new TeamEvent(
            $account->team_id,
            [
                'type' => 'wings.accounts.pending',
                'status' => 'pending'
            ]
        ));

        $data = $request->toArray();
        $data['team_id'] = $account->team_id;
        $data['type'] = 'update';

        dispatch(new AccountJob($account->id, $data));

        return response()->json(['status' => 1, 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(WingsPanelAccount $account)
    {
        userInTeamFail($account->team_id);

        if (!auth()->user()->can('wings.accounts.edit')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }

        broadcast(new TeamEvent(
            $account->team_id,
            [
                'type' => 'wings.accounts.pending',
                'status' => 'pending'
            ]
        ));

        $data = [
            'type' => 'delete',
            'team_id' => $account->team_id
        ];

        dispatch(new AccountJob($account->id, $data));

        return response()->json(['status' => 1, 'data' => $account->toArray()]);
    }
}