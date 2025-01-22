<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public static function search($search)
    {
        return Employer::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->get();
    }
}
