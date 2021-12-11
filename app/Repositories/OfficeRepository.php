<?php

namespace App\Repositories;

use App\Models\Offices;
use App\Repositories\Contracts\OfficeRepositoryContract;

class OfficeRepository implements OfficeRepositoryContract
{
    public function getOffice()
    {
        try {
            $office = Offices::orderBy('id', 'asc')->first();
            return $office;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // TODO: Implement getOffice() method.
    }
}
