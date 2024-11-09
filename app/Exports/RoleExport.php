<?php

namespace App\Exports;

use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Role::select('name')->get();
    }
}
