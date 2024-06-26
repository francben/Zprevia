<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//modelos de spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    function __constructor(){
        $this->middleware('permission: ver-rol | crear-rol | editar-rol | borrar-rol', ['only'=> ['index']]);
        $this->middleware('permission: crear-rol', ['only'=> ['create', 'store']]);
        $this->middleware('permission: editar-rol', ['only'=> ['edit', 'update']]);
        $this->middleware('permission: borrar-rol', ['only'=> ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permisos = Permission::get();
        return view('roles.crear', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $rol = Role::create(['name' => $request->input('name')]);
        $rol->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        $permisos = Permission::get();
        $rolesPermisos = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            -pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            -all();
        return view('roles.editar', compact('roles', 'permisos', ' rolesPermisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);

        $rol = Role::find($id);
        $rol->name = $request->input('name');
        $rol->save();

        $rol->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
