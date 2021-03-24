<?php

namespace App\Exports;

use App\Subscription;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class EmailExport implements FromQuery
{

    use Exportable;
    protected $email_array;

    public function __construct($email_array)
    {

        $this->email_array = $email_array;

    }

    public function query()
    {

        return Subscription::query()->whereKey($this->email_array);

    }
}
