<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements WithHeadingRow, ToCollection, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new User([
    //         'name'     => $row['name'],
    //         'email'    => $row['email'],
    //         'password' => Hash::make('password'),
    //     ]);
    // }


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $user = User::where('email', '=', $row['email'])->first();
            
            if ($user === null) {

                User::create([
                    'name'     => $row['name'],
                    'email'    => $row['email'],
                    'password' => Hash::make($row['password']),
                ]);
            } else {

                $user->name = $row['name'];
                $user->password = Hash::make($row['password']);
                $user->save();
            }
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

            // Above is alias for as it always validates in batches
            '*.name' => 'required',
            '*.email' => 'required|email',
            '*.password' => 'required',

        ];
    }
}
