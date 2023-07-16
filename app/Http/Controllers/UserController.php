<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel as Excel;

class UserController extends Controller
{
    public function index()
    {

        $users= User::get();
        return view('users', compact('users'));
       
    }

    public function import(Request $request)
    {
        $request->validate(['excel_file' => 'required|mimes:xlsx']);

        try {

            Excel::import(new UsersImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'Users Successfully imported!');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            //dd($failures);
            return redirect()->back()->with('import_errors', $failures);

            // foreach ($failures as $failure) {
            //     $failure->row(); // row that went wrong
            //     $failure->attribute(); // either heading key (if using heading row concern) or column index
            //     $failure->errors(); // Actual error messages from Laravel validator
            //     $failure->values(); // The values of the row that has failed.
            // }
        }
       
    }
}
