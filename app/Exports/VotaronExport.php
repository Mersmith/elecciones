<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class VotaronExport implements FromCollection
{
    public function collection()
    {
        $users = User::all();
        $data = [];
        $data[] = ["Name", "Email", "DNI"];

        foreach($users as $user){
            $data[] = [$user->name, $user->email, $user->dni];
        }

        return new Collection($data);
    }
}
