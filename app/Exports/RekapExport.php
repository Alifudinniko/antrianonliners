<?php

namespace App\Exports;

use App\Nomer;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return Nomer::all();
    }
}
