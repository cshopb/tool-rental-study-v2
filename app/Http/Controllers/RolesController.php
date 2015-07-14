<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller {

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sudos = Role::find(2)->users;
        $customers = Role::find(3)->users;

        return view('roles.index')->with(['sudos' => $sudos, 'customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);

        if ($user->role_id == 3)
        {
            $user->role_id = 2;
        } else
        {
            $user->role_id = 3;
        }

        $user->save();

        return redirect('/roles');
    }
}
