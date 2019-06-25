<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class CountyMultiplePriceImport implements WithMultipleSheets,WithProgressBar
{

    use Importable;
    protected $promo_code_id;
    public function __construct($promo_code_id)
    {
        $this->promo_code_id = $promo_code_id;
    }


    public function sheets(): array
    {
        return [
            // Select by sheet index
            'Domestic' => new CountyDomesticImport($this->promo_code_id),
            'Foreign' => new CountyForeignImport($this->promo_code_id),
        ];
    }
}
