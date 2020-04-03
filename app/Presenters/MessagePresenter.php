<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class MessagePresenter extends Presenter
{
    public function userName()
    {
        if($this->model->user_id){
            return $this->userLink();
        }
        return $this->model->nombre;
    }
    public function userEmail()
    {
        if($this->model->user_id){
            return $this->model->user->email;
        }
        return $this->model->email;
    }
    public function link()
    {
        $mensaje = $this->model->mensaje;
        return new HtmlString("<a href='". route('messages.show',$this->model->id) . "'>{$mensaje}</a>");
    }
    public function userLink()
    {
        /*$nameUser = $this->model->user->name;
        return "<a href='". route('usuarios.show',$this->model->user->id) . "'>{$nameUser}</a>";*/
        return $this->model->user->present()->link();
    }
    public function notes()
    {
        return $this->model->note ? $this->model->note->body : '';
    }
    public function tags()
    {
        return $this->model->tags->pluck('name')->implode(', ');
    }
}
?>
