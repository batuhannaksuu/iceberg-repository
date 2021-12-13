<?php

namespace App\Repositories\Contracts;

interface ContactRepositoryContract
{
    public function createContact(array $data);
    public function delete(int $id);
}
