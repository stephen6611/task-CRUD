<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Route;


class PendudukProfileTabs extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab'];

    public $name, $gender, $tempat_lahir, $tanggal_lahir, $nik, $gol_darah, $status_nikah, $kewarganegaraan, $penduduk_id;

    public function selectTab($tab){
        $this->tab = $tab;
    }

    public function mount(){
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        if( Auth::guard('penduduk')->check() ){
            $penduduk = Penduduk::findOrFail(auth()->id());
            $this->penduduk_id = $penduduk->id;
            $this->name = $penduduk->name;
            $this->gender = $penduduk->gender;
            $this->tempat_lahir = $penduduk->tempat_lahir;
            $this->tanggal_lahir = $penduduk->tanggal_lahir;
            $this->nik = $penduduk->nik;
            $this->gol_darah = $penduduk->gol_darah;
            $this->status_nikah = $penduduk->status_nikah;
            $this->kewarganegaraan = $penduduk->kewarganegaraan;  
    }
}
    public function updatePendudukPersonalDetails(){
        $this->validate([
            'name'=>'required|min:5',

        ]);

        Penduduk::find($this->penduduk_id)
            ->update([
                'name'=> $this->name,
            ]);

        // $this->emit('updatePendudukHeaderProfileInfo');
        // $this->dispatch('updatePendudukInfo',[
        //     'pendudukName'=>$this->name,
        // ]);

        $this->showToastr('success','Detail Informasi anda telah diperbarui.');
        // return redirect()->to('/penduduk/profile');
    }

//     public function updatePendudukInfo($pendudukName)
// {
//     $this->dispatch('updatePendudukInfo', ['pendudukName' => $pendudukName]);
// }


    public function showToastr($type, $message){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=> $type,
            'message'=> $message
        ]);

    }
    public function render()
    {
        return view('livewire.penduduk-profile-tabs');
    }
}
