<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rw;

class Dropdowns extends Component
{

    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;
    public $rws;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $selectedRw = null;

    public function mount($selectedRw = null)
    {
        $this->provinsis = provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->kelurahans = collect();
        $this->rws = collect();
        $this->selectedRw = $selectedRw;

        if(!is_null($selectedRw))
        {
            $rw = rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);
            if($rw)
            {
                $this->rws = rw::where('id_kelurahan', $rw->id_kelurahan)->get();
                $this->kelurahans = kelurahan::where('id_kecamatan',$rw->kelurahan->id_kecamatan)->get();
                $this->kecamatans = kecamatan::where('id_kota',$rw->kelurahan->kecamatan->id_kota)->get();
                $this->kotas = Kota::where('id_provinsi',$rw->kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->SelectedProvinsi = $rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->SelectedKota = $rw->kelurahan->kecamatan->id_kota;
                $this->SelectedKecamatan = $rw->kelurahan->id_kecamatan;
                $this->SelectedKelurahan = $rw->nama_kelurahan;
            }
        }

    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kotas = kota::where('id_provinsi',$provinsi)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
        $this->selectedRw = Null;
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatans = kecamatan::where('id_kota',$kota)->get();
        $this->selectedKelurahan = NULL;
        $this->selectedRw = null;
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kelurahans = kelurahan::where('id_kecamatan',$kecamatan)->get();
        $this->selectedRw = null;
    }

    public function updatedSelectedKelurahan($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rws = rw::where('id_kelurahan', $kelurahan)->get();
        } else {
            $this->selectedRw = null;
        }
    }


}