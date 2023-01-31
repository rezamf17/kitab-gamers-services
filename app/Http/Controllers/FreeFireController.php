<?php

namespace App\Http\Controllers;

use App\Models\FreeFireModel;
use App\Models\FreeFireCharactersModel;
use Illuminate\Http\Request;

class FreeFireController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $freeFireModel = FreeFireModel::with(['freeFire'])->get();
        return response()->json([
            'message' => 'Success',
            'data' => $freeFireModel
        ], 200);
    }

    public function add(Request $request)
    {
        $freeFire = new FreeFireCharactersModel;
        $freeFireId = new FreeFireModel;
        $freeFire->name = $request->input('name');
        $freeFire->gender = $request->input('gender');
        $freeFire->price = $request->input('price');
        $freeFire->dob = $request->input('dob');
        $freeFire->occupation = $request->input('occupation');
        $freeFire->hobby = $request->input('hobby');
        $freeFire->ability = $request->input('ability');
        $freeFire->story = $request->input('story');
        $freeFire->save();
        $freeFireId->id = $freeFire->id;
        $freeFireId->id_characters = $freeFire->id;
        $freeFireId->save();
        return response()->json([
            'message' => 'Add Success',
            'data_menu' => $freeFire
        ], 201);
    }

    //
}
