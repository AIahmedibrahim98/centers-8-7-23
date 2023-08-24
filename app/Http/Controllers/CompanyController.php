<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::query();
        if ($request->has('search')) {
            $companies->where('name', 'like', '%' . $request->search . '%')->orWhere('owner', 'like', '%' . $request->search . '%');
        }
        return view('companies.index', ['companies' => $companies->orderBy('created_at', 'desc')->orderBy('name')->paginate(10)]);
        // return view('companies.index', ['companies' => $companies->orderBy('name')->simplePaginate(10)]);
    }
    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|min:3',
            'owner' => 'required',
            'tax_number' => 'nullable|numeric'
        ], [
            'tax_number.numeric' => 'لازم الرقم الضريبي يكون رقم.'
        ]);
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only(['name', 'owner']));
        // Company::create($request->except('_token'));
        $company = new Company();
        $company->name = $request->name;
        $company->owner = $request->owner;
        $company->tax_number = $request->tax_number;
        $company->save();
        return redirect()->to('/companies');
        // return redirect()->route('companies.index');
    }
}
