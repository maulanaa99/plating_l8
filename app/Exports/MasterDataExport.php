<?php

namespace App\Exports;

use App\Models\MasterData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MasterDataExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterData::all();
    }

    public function headings(): array
    {
        return ["id","No Part", "Part Name", "Katalis", "Channel", "Grade Color", "Qty Bar"];
    }
}
