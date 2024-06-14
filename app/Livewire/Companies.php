<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Company;
use App\Models\User;
use App\Models\Delegate;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Hash;

class Companies extends Component
{
    use WithFileUploads;
    public Event $event;
    public $name;
    public $email;
    public $telephone;
    public $cif;
    public $address;
    public $locality;
    public $province;
    public $sector;
    public $logo;
    public $cover,$eventid;

    public $logoFile,$portfolioFile, $videoFile, $coverFile;

    public $identificacion,$nombre, $pasword, $correo, $telefono, $rol;


    public function mount()
    {
        $company = Company::where('admin', Auth::id())->first();

        if ($company) {
            $this->eventid = $company->id;
            $this->company = $company;
            $this->name = $company->name;
            $this->email = $company->email;
            $this->telephone = $company->telephone;
            $this->cif = $company->cif;
            $this->address = $company->address;
            $this->locality = $company->locality;
            $this->province = $company->province;
            $this->sector = $company->sector;
            $this->logo = $company->logo;
            $this->cover = $company->cover;
        }
    }

    public function verDetalleEvento($id)
    {
        $company = Company::where('admin', Auth::id())->first();

        $this->dispatch('open-modal', name : 'ver-Evento');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:255',
            'cif' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'locality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'sector' => 'required|string|max:255',

            'logoFile' => 'nullable|image|max:1024', // 1MB Max
            'portfolioFile' => 'nullable|mimes:pdf,doc,docx|max:5120', // 5MB Max
            'videoFile' => 'nullable|mimes:mp4,mov,avi,wmv|max:10480', // 10MB Max
            'coverFile' => 'nullable|image|max:2048', // 2MB Max
        ]);
       
        $company = Company::where('admin', Auth::id())->first();

        if ($this->logoFile) {
            $companyFolder = 'logos-empresa/' . $company->id;
            $this->logo = $this->logoFile->storeAs($companyFolder, $this->logoFile->hashName(), 'public');

        }

        if ($this->portfolioFile) {
            $companyFolder = 'portfolios-empresa/' . $company->id;
            $this->logo = $this->logoFile->storeAs($companyFolder, $this->logoFile->hashName(), 'public');

        }
            

        if ($this->videoFile) {
            $companyFolder = 'videos-empresa/' . $company->id;
            $this->logo = $this->logoFile->storeAs($companyFolder, $this->logoFile->hashName(), 'public');

        }

        if ($this->coverFile) {
            $companyFolder = 'covers-empresa/' . $company->id;
            $this->logo = $this->logoFile->storeAs($companyFolder, $this->logoFile->hashName(), 'public');

        }



        $company->update([
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'cif' => $this->cif,
            'address' => $this->address,
            'locality' => $this->locality,
            'province' => $this->province,
            'sector' => $this->sector,
            'logo' => $this->logo,
            
        ]);

        session()->flash('message', 'Company details updated successfully.');
    }

    public function crear($id)
    {

        $this->validate([
            'identificacion' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'pasword' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:users,email', 
            'identificacion' => 'required|string|max:10|unique:delegates,dni', 
            'telefono' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            
        ]);
        $company = Company::where('admin', Auth::id())->first();
        $usernew =new User;
            $usernew->name = $this->nombre;
            $usernew->email = $this->correo;
            $usernew->password = Hash::make($this->pasword);
        if($usernew->save()){
            $delegate = new Delegate;
            $delegate->name = $this->nombre;
            $delegate->company = $company->id;
            $delegate->user = $usernew->id;
            $delegate->telephone = $this->telefono;
            $delegate->dni = $this->identificacion;
            $delegate->position = $this->rol;
            $delegate->save();
        }
        session()->flash('message', 'Company details updated successfully.');
    }

    public function render()
    {
        return view('livewire.companies');
    }
}
