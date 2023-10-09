<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\backorderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Backorder;
use Illuminate\Http\Request;

class BackorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(backorderDataTable $dataTable)
    {
        return $dataTable->render('admin.product.backorder.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.backorder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:200','unique:backorders,name'],
            'sell' => ['required', 'integer'],
            'block' => ['required', 'integer'],
            


        ]);

        $backorder = new Backorder();
        $backorder->name = $request->name;
        $backorder->sell = $request->sell;
        $backorder->block = $request->block;

        $backorder->save();

        toastr('Stworzeono', 'success', 'Success');

        return redirect()->route('admin.backorder.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $backorder = Backorder::findOrFail($id);
        return view('admin.product.backorder.edit', compact('backorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'sell' => ['required', 'integer'],
            'block' => ['required', 'integer'],

        ]);

        $backorder = Backorder::findOrFail($id);
        
        $backorder->sell = $request->sell;
        $backorder->block = $request->block;
        $backorder->save();

        toastr('Zaktualizowano', 'success', 'Success');

        return redirect()->route('admin.backorder.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $backorder = Backorder::findOrFail($id);
        $backorder->delete();

        return response(['status' => 'success', 'message' => 'Usunięto']);
    }

}