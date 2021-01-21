<?php

namespace App\Repositories\Interfaces;

interface LeagueRepositoryInterface
{
    public function all();

    public function detail($id);

    public function create(array $data);

    //public function update(array $data, $id);

}
