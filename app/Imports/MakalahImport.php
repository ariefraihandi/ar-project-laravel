<?php

namespace App\Imports;

use App\Models\Makalah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MakalahImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Makalah([
            'kode' => $row['kode'],
            'url' => $row['url'],
            'harga' => $row['harga'],
        ]);
    }
}