<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter
{
    public function link()
    {
        $name = $this->model->name;
        return new HtmlString("<a href='". route('usuarios.show',$this->model->id) . "'>{$name}</a>");
    }
    public function roles()
    {
        return  $this->model->roles->pluck('display_name')->implode(' - ');
    }
    public function notes()
    {
        return $this->model->note->body ?? 'No hay Nota asignada';
    }
    public function tags()
    {
        return  $this->model->tags->pluck('name')->implode(', ');
    }

}
?>
