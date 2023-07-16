<?php

namespace App\Http\Controllers;

use App\Models\CS;
use App\Models\CS_details;
use App\Models\CS_Supplier_details;
use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CSController extends Controller
{

    public function index() {

        $cses = CS::all();
        return view('list', compact('cses'));

    }
    public function create()
    {
        # code...
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('cs', compact('materials', 'suppliers'));
    }

    public function store(Request $request)
    {

        $cs = new CS;

        $cs->cs_ref_no = $request->cs_ref_no;
        $cs->effective_date = $request->effective_date;
        $cs->expiry_date = $request->expiry_date;
        $cs->remarks = $request->remarks;
        $cs->created_by = "nasrin";
        $cs->updated_by = "nn";

        $cs->save();


        // Supplier details

         $supplier_id= $request->supplier_id;

        for($i=0; $i < count($supplier_id); $i++){

            $cs_supplier_details = new CS_Supplier_details;

            $cs_supplier_details->cs_id = $cs->id;

            $cs_supplier_details->supplier_id = $request->supplier_id[$i];
            $cs_supplier_details->selected =$request->selected[$i];
            //$cs_supplier_details->selected = "yes";


            $cs_supplier_details->price_colllection_way = $request->price_colllection_way[$i];
            $cs_supplier_details->grade = $request->grade[$i];
            $cs_supplier_details->vat = $request->vat[$i];
            $cs_supplier_details->tax = $request->tax[$i];
            $cs_supplier_details->credit_period = $request->credit_period[$i];
            $cs_supplier_details->material_availability = $request->material_availability[$i];
            $cs_supplier_details->delivery_condition = $request->delivery_condition[$i];
            $cs_supplier_details->required_time = $request->required_time[$i];
            $cs_supplier_details->remarks = $request->remarks[$i];

            $cs_supplier_details->created_by = "nasrin";
            $cs_supplier_details->updated_by = "";

            $cs_supplier_details->save();
        }


        $material_selected_id = $request->materialSelected;
        $Supplier_selected_id = $request->supplierSelected;


        //dd($material_selected_id, $Supplier_selected_id);
        $r=0;
        for ($m = 0; $m < count($material_selected_id); $m++) {
            for ($s = 0; $s < count($Supplier_selected_id); $s++) {
               
                $cs_details = new CS_details;

                $cs_details->cs_id = $cs->id;
                $cs_details->rate = $request->rates[$r];
                $cs_details->supplier_id = $request->supplierSelected[$s];
                $cs_details->material_id = $request->materialSelected[$m];

                $cs_details->created_by = "nasrin";
                $cs_details->updated_by = "nn";

                $cs_details->save();
                $r++;
            }
        }

        //dd($request->all());
        return redirect('cs')->with('message', 'CS created successfully');
    }

    public function view($cs_id)
    {
        $cs = CS::findOrFail($cs_id);
        $cs_details = CS_details::where('cs_id', $cs_id)->get();
        $cs_supplier_details = CS_Supplier_details::where('cs_id', $cs_id)->get();
        


        return view('details', compact('cs', 'cs_details','cs_supplier_details'));
    }

    public function delete($cs_id)
    {
        $cs = CS::findOrFail($cs_id);

        $cs->delete();
        return redirect('cs')->with('message', 'CS deleted successfully');
    }
}
