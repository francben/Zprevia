<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        dd($this->logofile, $this->cover);
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

        if ($this->logoFile) {
            $this->logo = $this->logoFile->store('logos-empresa', 'public');
            dd($this->logo);
        }

        if ($this->portfolioFile) {
            $portfolioPath = $this->portfolioFile->store('portfolios-empresa', 'public');
            dd($portfolioPath);

        }

        if ($this->videoFile) {
            $videoPath = $this->videoFile->store('videos-empresa', 'public');
            dd($videoPath);
        }

        if ($this->coverFile) {
            $coverPath = $this->coverFile->store('covers-empresa', 'public');
            dd($coverPath);
        }



        $company = Company::where('admin', Auth::id())->first();
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
            'portfolio' => $portfolioPath ?? $this->company->portfolio,
            'video' => $videoPath ?? $this->company->video,
            'cover' => $coverPath ?? $this->company->cover,
        ]);

        session()->flash('message', 'Company details updated successfully.');
    }

    public function render()
    {
        return view('livewire.companies');
    }
}
