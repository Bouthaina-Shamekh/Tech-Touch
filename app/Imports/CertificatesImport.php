<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToCollection,WithHeadingRow
{
    public $data = [];
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // افترض أن الاسم في العمود الأول
            $this->data[] = [
                'name' => $row['alasm'],
                'email' => $row['alaymyl'],
            ];
        }
    }
}
