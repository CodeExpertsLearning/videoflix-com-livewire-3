<?php

namespace App\Livewire\Media;

use App\Livewire\Forms\ContentForm;
use App\Models\Content;
use Livewire\Component;

class EditContent extends Component
{
    public $content;

    public $labelButton = 'Atualizar Conteúdo';

    public ContentForm $form;

    public function mount(Content $content)
    {
        $this->content = $content->id;
        $this->form->setContent($content);
    }

    public function save()
    {
        if($this->form->update($this->content)) {
            session()->flash('success', 'Conteúdo atualizado com sucesso!');
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.media.form');
    }
}
