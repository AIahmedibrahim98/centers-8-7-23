<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // $companies = Company::all();
            // $companies = CompanyResource::collection(Company::all());
            $companies = new CompanyCollection(Company::all());
            // return $companies;
            return response()->json($companies);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'falid',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'owner' => 'required',
            'tax_number' => 'required|string|max:20'
        ]);
        try {
            $c =  Company::create($request->all());
            return response()->json([
                'status' => 'Company Created',
                'company' => new CompanyResource($c)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // $company = Company::findOrFail($id);
            $company = new CompanyResource(Company::findOrFail($id));
            return response()->json([
                'status' => 'Company returned',
                'company' => $company
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->update($request->all());
            return response()->json([
                'status' => 'Company updated',
                'company' => new CompanyResource($company)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $compony = Company::findOrFail($id);
            if ($compony) {
                $compony->delete();
                return response()->json([
                    'status' => 'Company Deleted',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'faild',
                'message' => $e->getMessage()
            ]);
        }
    }
}
