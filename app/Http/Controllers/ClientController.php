<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = $this->repository->all();
        $meta = collect(
            [
                'client'=>$client,
                'meta' => array('total'=> $client->count())
            ]
        );
        return $meta;
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
        return $this->repository->create($request->all());
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
        return $this->repository->find($id);
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
        $object = $this->repository->find($id);

        if ($object) {
            $object->update($request->all());
            return response()->json(['data'=> $object, 'message' => 'The zone has been updated'], 200);
        }
        return response()->json(
            [
                'data'=>'',
                'message' => 'Record not found',
                'errors' => []
            ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = $this->repository->find($id);

        if ($object) {
            $data = $object;
            $object->delete();
            return response()->json(
                [
                    'data' => $data,
                    'message' => 'Object delete successfully',
                    'timestamp' => Carbon::now()->setTimezone('UTC'),
                    'success' => true
                ], 200);
        }
        return response()->json(
            [
                'data'=>'',
                'message' => 'Record not found',
                'errors' => []
            ], 404);
    }
}
