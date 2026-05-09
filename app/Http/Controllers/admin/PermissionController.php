<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission  = Permission::get();
        $roles = Role::all();
        return view('admin.permission.index', compact('roles','permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $roles = Role::pluck('name', 'id');
            return view('admin.permission.add', compact('roles'));
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->errors()->all());
        }

        try {
            $permission = Permission::create(['name' => $request->permission]);
            $permission->syncRoles($request->roles);

            if ($permission) {
                return redirect('permission')->with('success', 'Permission created succesfully!');
            } else {
                return redirect('permission')->with('error', 'Failed to create permission! Try again.');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
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
        $permission  = Permission::where('id', $id)->first();
        // if role exist
        if ($permission) {
            $role_permission = $permission->roles()->pluck('id')->toArray();

            $roles = Role::pluck('name', 'id');
            // return response($permission->roles()->get()->toArray());
            return view('admin.permission.edit', compact('permission', 'roles', 'role_permission'));
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
        $validator = Validator::make($request->all(), [
            'permission' => ['required', 'string', 'max:255'],
            'id'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->errors()->all());
        }
        try {
            $decrypted = Crypt::decryptString($request->id);
            $permission = Permission::find($decrypted);

            $update = $permission->update([
                'name' => $request->permission
            ]);

            // Sync role permissions
            $permission->syncRoles($request->roles);

            return redirect()->route('permission')->with('success', 'Permission info updated succesfully!');
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
        $permission   = Permission::find($id);
        if ($permission) {
            $delete = $permission->delete();
            $perm   = $permission->roles()->delete();

            return redirect('permission')->with('success', 'Permission deleted!');
        } else {
            return redirect('404');
        }
    }
}
