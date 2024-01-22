<?php

namespace App\Livewire;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use Livewire\Component;

class PendudukHeaderProfileInfo extends Component
{
    public $penduduk;

    public $listener = [
        'updatePendudukHeaderProfileInfo'=>'$refresh'
    ];

    public function mount()
    {if( Auth::guard('penduduk')->check() ){
        $this->penduduk = Penduduk::findOrFail(auth()->id());
    }
    }

    public function render()
    {
        return view('livewire.penduduk-header-profile-info');
    }
}
