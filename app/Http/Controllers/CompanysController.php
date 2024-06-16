<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::where('admin', Auth::id())->get();

        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function editar()
    {
        //agregar validacion
        $company = Company::where('admin', Auth::id())->first();
        $user = Auth::user();
        //dd($company,$user);
        return view('profile.form_info', compact('company', 'user'));

    }
    public function edit()
    {}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $company=Company::where('admin',$user->id)->first();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:30',
            'dni' => 'required|string|max:20',
            'rol_en_empresa' => 'required|string|max:255',
            'photo' => 'nullable|image|max:4096',
        ]);
        if($request->photo == null){

        }else{
            if ($request->hasFile('photo')) {
                try {
                    if (!$user->id) {
                        throw new Exception('El usuario no tiene un ID válido.');
                    }
                    $extension = $request->file('photo')->getClientOriginalExtension();
                    $randomFileName = Str::random(40) . '.' . $extension;
                    $path = $request->file('photo')->storeAs(
                        'profile/' . $user->id, 
                        $randomFileName, 
                        'public'
                    );
                    $user->profile_photo_path = 'profile/' . $user->id . '/' . $randomFileName;
                    $user->save();
                    $request->photo = $path;
                } catch (Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }
        }
            
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->photo){
            $user->profile_photo_path=$request->photo;
        }
        $user->update();

        $company->dni=$request->dni;
        $company->telephone=$request->telephone;
        $company->dni=$request->dni;
        $company->rol_en_empresa=$request->rol_en_empresa;
        $company->update();

        return redirect()->route('company.perfil')->with('success', 'Perfil actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profiledelete()
    {
        $user = User::findOrFail(Auth::id());
            //Storage::disk('public')->delete($user->profile_photo_path);
        $user->profile_photo_path = null;
        $user->update();
        return redirect()->route('company.perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
