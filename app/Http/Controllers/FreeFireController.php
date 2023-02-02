<?php

namespace App\Http\Controllers;

use App\Models\FreeFireModel;
use App\Models\FreeFireCharactersModel;
use App\Models\FreeFireCharactersLevelUpModel;
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
        $freeFireLevelModel = FreeFireCharactersModel::with(['freeFireLevel'])->get();
        return response()->json([
            'message' => 'Success',
            'data' => $freeFireLevelModel
        ], 200);
    }

    public function add(Request $request)
    {
        $freeFire = new FreeFireCharactersModel;
        $freeFireId = new FreeFireModel;
        $freeFireLevel = new FreeFireCharactersLevelUpModel;
        // $freeFireLevel = $request->level_up;
        // $freeFireLevel->required_fragments = $request->input('required_fragments');
        // $freeFireLevel->desc = $request->input('desc');
        // $freeFireLevel->reward = $request->input('reward');
        // for ($i=0; $i <= count($request->level_up); $i++) {
        //     $levels = array(
        //         'level' =>$request->level_up[$i]['level'],
        //         'required_fragments' => $request->level_up[$i]['required_fragments'],
        //         'desc' => $request->level_up[$i]['desc'],
        //         'reward' => $request->level_up[$i]['reward'],
        //     );
        //     // return $request->level_up[$i]['level'];
        //     FreeFireCharactersLevelUpModel::Create($levels);
        // }

        // $freeFireLevel->save();
        // $freeFire->id_levelup =  FreeFireCharactersLevelUpModel::Create($levels)->id;
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
        foreach ($request->level_up as $key => $value) {
            $levels = array(
                'id_character' => $freeFire->id,
                'character_name' => $value['character_name'],
                'level' => $value['level'],
                'required_fragments' => $value['required_fragments'],
                'desc' => $value['desc'],
                'reward' => $value['reward'],
            );
            // return $levels;
            FreeFireCharactersLevelUpModel::Create($levels);
        }
        // return $request;
        return response()->json([
            'message' => 'Add Success'
        ], 201);
    }

    //
}
