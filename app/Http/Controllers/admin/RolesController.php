<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Services\CommonHelper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.roles.index', compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::pluck('name', 'id');
        return view('admin.roles.add', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'role' => ['required', 'string', 'max:255'],
        // ]);

        $validator = Validator::make($request->all(), [
            'role' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->errors()->all());
        }
        try {
            $role = Role::create(['name' => $request->role]);

            if ($role) {
                $role->syncPermissions($request->permissions);
                return Redirect::back()->with('success', 'Record updated.');
            } else {
                return redirect()->back()->with('error', 'Failed to create role! Try again.');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
       
        //return redirect("/roles");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role  = Role::where('id', $id)->first();
        // if role exist
        if ($role) {
            $role_permission = $role->permissions()
                ->pluck('id')
                ->toArray();

            $permissions = Permission::pluck('name', 'id');

            return view('admin.roles.edit', compact('role', 'role_permission', 'permissions'));
        } else {
            return redirect('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'role' => ['required', 'string', 'max:255'],
            'id'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->errors()->all());
        }

        try {
            $decrypted = Crypt::decryptString($request->id);
            $role = Role::find($decrypted);

            $update = $role->update([
                'name' => $request->role
            ]);

            // Sync role permissions
            $role->syncPermissions($request->permissions);

            return redirect()->route('roles')->with('success', 'Role info updated succesfully!');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role   = Role::find($id);
        if ($role) {
            $delete = $role->delete();
            $role->permissions()->delete();
            return redirect()->route('roles')->with('success', 'Role deleted!');
        } else {
            return redirect('404');
        }
    }
}
