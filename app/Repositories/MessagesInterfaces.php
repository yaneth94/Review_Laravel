<?php
namespace App\Repositories;

interface MessagesInterfaces
{
    public function getPaginate();

    public function store($request);

    public function findById($id);

    public function update($request,$id);

    public function destroy($id);

}
?>
