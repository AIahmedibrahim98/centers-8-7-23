<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        // dd(app()->getLocale());
        // app()->setLocale('ar');
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
        // session()->put('added', 'New Company Added');
        // session()->forget('added');
        // session()->flash('added', 'New Company Added');
        // return redirect()->to('/companies');
        return redirect()->route('companies.index')->with('added', 'New Company Added');
    }
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|min:3',
            'owner' => 'required',
            'tax_number' => 'nullable|numeric'
        ], [
            'tax_number.numeric' => 'لازم الرقم الضريبي يكون رقم.'
        ]);
        $company = Company::findOrFail($id);
        $company->update($request->except('_token'));
        return redirect()->route('companies.index')->with('added', 'Company updated');
    }
    public function delete($id)
    {
        try {
            Company::destroy($id);
            return redirect()->route('companies.index')->with('added', 'Company Deleted');
        } catch (Exception  $e) {
            Log::info($e->getMessage());
            return redirect()->route('companies.index');
        }
    }
}
