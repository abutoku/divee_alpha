<?php

namespace App\Http\Livewire;

use Livewire\Component;
//Siterモデルの読み込み
use App\Models\Site;

class Sitemap extends Component
{
    public $site_id;

    public function render()
    {
        $sites = Site::all();
        return view('livewire.sitemap',[
            'sites' => $sites
        ]);
    }
}
