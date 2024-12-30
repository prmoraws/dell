<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class ShowCategorias extends Component
{
    public function render()
    {
        $categorias = Categoria::get();

        return view('livewire.show-categorias', [
            'categorias' => $categorias
        ]);
    }
}
