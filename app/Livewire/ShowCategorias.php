<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class ShowCategorias extends Component
{

    public $categorias, $nome, $descricao, $categoria_id;

    public $isOpen = 0;



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function render()

    {

        $this->categorias = Categoria::all();

        return view('livewire.show-categorias');
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function create()

    {

        $this->resetInputFields();

        $this->openModal();
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function openModal()

    {

        $this->isOpen = true;
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function closeModal()

    {

        $this->isOpen = false;
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    private function resetInputFields()
    {

        $this->nome = '';

        $this->descricao = '';

        $this->categoria_id = '';
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function store()

    {

        $this->validate([

            'nome' => 'required',

            'descricao' => 'required',

        ]);



        Categoria::updateOrCreate(['id' => $this->categoria_id], [

            'nome' => $this->nome,

            'descricao' => $this->descricao

        ]);



        session()->flash(
            'message',

            $this->categoria_id ? 'Categoria atualizada com sucesso.' : 'Categoria criada com sucesso.'
        );



        $this->closeModal();

        $this->resetInputFields();
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function edit($id)

    {

        $post = Categoria::findOrFail($id);

        $this->categoria_id = $id;

        $this->nome = $post->nome;

        $this->descricao = $post->descricao;



        $this->openModal();
    }



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function delete($id)

    {

        Categoria::find($id)->delete();

        session()->flash('message', 'Categoria deletada com sucesso.');
    }
}
