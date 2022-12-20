<?php

namespace App\Http\Controllers;

use App\Models\Expectation;
use App\Models\UserExpectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(UserExpectation::where('expectation_id' ,$request->expectation_id)->where('user_id',$request->user_id)->first());
        if (UserExpectation::where('expectation_id' ,$request->expectation_id)->where('user_id',$request->user_id)->first()) {
            return $this->error('', 'you are already  expatiate this event', 403);
        }

        $request->validate([
            'expect' => 'required|string',

        ]);



        $exp = new UserExpectation;
        $exp->user_id = $request->user_id; // Auth::user()->id,
        $exp->expectation_id = $request->expectation_id;
        $exp->expect = $request->expect;

        $exp->save();
        return $this->success('', 'your expatiation reserved successfully', 201);
    }
    public function addExpectation(Request $request)
    {
        // dd($request);

        $exp =  $request->validate([
            'team_1_picture' => 'required|string',
            'team_2' => 'required|string',
            'team_2_picture' => 'required|string',
            'team_1' => 'required|string',
            'date' => 'required|string',
            'result' => 'required|string',
            'points' => 'required|string',

        ]);
        Expectation::create($exp);


        // $exp = new UserExpectation;



        // $exp->points = $request->points; // Auth::user()->id,
        // $exp->result = $request->result;
        // $exp->date = $request->date;
        // // $exp->team_2_picture =
        // // base64_encode(file_get_contents($request->file('team_2_picture')));

        // $exp->team_1 = $request->team_1;
        // $exp->team_2 = $request->team_2;

        // $exp->team_1_picture = $request->team_1_picture;
        // $exp->team_2_picture = $request->team_2_picture;
        // //  base64_encode(file_get_contents($request->file('team_1_picture')));


        // $exp->save();
        return $this->success('', 'Expectation created successfully', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expectation  $expection
     * @return \Illuminate\Http\Response
     */
    public function show(Expectation $expection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expectation  $expection
     * @return \Illuminate\Http\Response
     */
    public function edit(Expectation $expection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expectation  $expection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expectation $expection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expectation  $expection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expectation $expection)
    {
        //
    }
}
