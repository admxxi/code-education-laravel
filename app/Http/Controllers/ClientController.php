<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;

use CodeProject\Http\Requests;

use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \CodeProject\Client::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return \CodeProject\Client::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return \CodeProject\Client::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $object = \CodeProject\Client::find($id)->update($request->all());
        return response()->json(['data'=> $object, 'message' => 'The zone has been updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = \CodeProject\Client::find($id);
        echo date('l jS \of F Y h:i:s A');

        if($object) {
            $data = $object;
            $object->delete();
            return response()->json(
                [
                    'data' => $data,
                    'message' => 'Object delete successfully',
                    'timestamp' => Carbon::now()->setTimezone('UTC'),
                    'success' => true
                ], 200);
        } else {
            return response()->json(
                [
                    'data'=>'',
                    'message' => 'Record not found',
                    'errors' => []
                ], 404);
        }
    }
}
