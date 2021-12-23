<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Gate::allows('user_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('user_delete')) {
                return abort(401);
            }
            $users = User::onlyTrashed()->get();
        } else {
            $users = User::with('roles')->orderBy('created_at', 'ASC')->get();
        }

        if ($request->input('user_id')) {
            $users = User::where('id', $request->input('user_id'))->get();
        }

        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created user in storage.
     *
     * @param \App\Http\Requests\StoreusersRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }
        /**
         * Issue here. To be fix later.
         */
        /*
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users',
            'phone' => 'required|integer',
        ]);
        */
        $password = User::generatePassword();
       

        try {
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => $password,
               // 'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
            ]);

            $user->assignRole($request->input('role'));

        flash('New user successfully created!')->success();

            return redirect()->route('admin.users.index');
        } catch (\Exception $th) {
            flash('Something went wrong!')->error()->important();

            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Show the form for editing user.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }

        try {
            $user = User::findOrFail($id);

            $role = $user->getRoleNames()->first();

            return response()->json(['status' => 'success', 'data' => $user,'role'=>$role]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Show the form for editing user.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showDelete($id)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }

        try {
            $user = User::findOrFail($id);

            return response()->json(['status' => 'success', 'data' => $user->get(['id'])]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Update user in storage.
     *
     * @param \App\Http\Requests\UpdateusersRequest $request
     * @param int                                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $user = User::findOrFail($request->input('user_id'));

        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),

        ]);


        if ($user->getRoleNames()->first() != $request->input('user_role')) {
            $user->syncRoles($request->input('user_role'));
            if ($request->input('user_role') != 'admin') {
                if(!$user->wallet){
                    $user->wallet()->create([
                        'amount' => 0.00,
                        'is_active' => true,
                    ]);
                }
            }
        }

        flash($user->getFullName().' successfully updated!')->success();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display user.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Remove user from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        //dd($id);
        $user = User::findOrFail($id);
        $user->delete();

        //flash('user successfully deleted!')->success();

        return response()->json(['status'=>'success','message'=>'Category successfully deleted']);

    }

    /**
     * Restore user from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        flash('user successfully restored!')->success();

        return redirect()->route('admin.users.index');
    }

    /**
     * Permanently delete user from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::onlyTrashed()->findOrFail($id);
        $user->removeRole($user->getRoleNames()->first());
        $user->forceDelete();
        flash('user permanently deleted!')->success();

        return redirect()->route('admin.users.index');
    }  //
}