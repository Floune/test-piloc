<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyCreateRequest;
use App\Http\Requests\PropertyUpdateRequest;
use App\Http\Services\PropertySearch;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * @param PropertyCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(PropertyCreateRequest $request) {
        $property = new Property();
        $property->title = $request->input("title");
        $property->city = $request->input("city");
        $property->street = $request->input("street");
        $property->zip = $request->input("zip");
        $property->surface = $request->input("surface");
        $property->price = $request->input("price");
        $property->status = $request->input("status");

        Auth()->user()->properties()->save($property);
        return response()->json(["message" => "property created"],200);
    }

    /**
     * @param PropertyUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PropertyUpdateRequest $request) {
        $property = Property::find($request->input("id"));
        $property->title = $request->input("title");
        $property->city = $request->input("city");
        $property->street = $request->input("street");
        $property->zip = $request->input("zip");
        $property->surface = $request->input("surface");
        $property->price = $request->input("price");
        $property->status = $request->input("status");
        $property->save();
        return response()->json(["message" => "property updated"],200);

    }

    /**
     * @param Request $request
     * @return void
     */
    public function search(Request $request) {
        $researcher = new PropertySearch($request->all());
        $payload = $researcher->search();
        return $payload;
    }
}
