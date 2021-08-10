<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CEOResource;
use App\Models\CEO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;


class CEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ceos= CEO::all();

        return response([
            'ceos' => CEOResource::collection($ceos),
            'message' => 'Retrieved  Successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $validator =  Validator::make($data, [
            'name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'year' => 'required|max:255',
            'company_headquarters' => 'required|max:255',
            'what_company_does' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'message' =>'Validation Fail '], 400);
        }

        $ceo = CEO::create($data);

        return response(['ceo' => new CEOResource($ceo),
            'message' => 'Created Successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CEO  $CEO
     * @return \Illuminate\Http\Response
     */
    public function show(CEO $CEO)
    {

        return response(['ceo' => new CEOResource($CEO),
            'message' => 'Retrieved  Successfully'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CEO  $CEO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CEO $CEO)
    {
        $CEO->update($request->all());

        return response(['ceo' => new CEOResource($CEO),
            'message' => 'Retrieved  Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CEO  $CEO
     * @return \Illuminate\Http\Response
     */
    public function destroy(CEO $CEO)
    {
        $CEO->delete();

        return response(['message' => 'Deleted']);
    }
}
