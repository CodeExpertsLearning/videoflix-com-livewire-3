<?php

namespace App\Livewire\Media;

use App\Livewire\Forms\ContentForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateContent extends Component
{
    use WithFileUploads;

    public $labelButton = 'Criar Conteúdo';

    public ContentForm $form;

    public function save()
    {
        if($this->form->save()){
            session()->flash('success', 'Conteúdo criado com sucesso!');
            return redirect()->route('media.contents.index');
        }
    }

    public function render()
    {
        return view('livewire.media.form');
    }
}
