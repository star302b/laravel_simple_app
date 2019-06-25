<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class CountyMultipleImport implements WithMultipleSheets,WithProgressBar
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
            'Domestic' => new CountyPromoDomesticImport($this->promo_code_id),
            'Foreign' => new CountyPromoForeignImport($this->promo_code_id),
        ];
    }
}
