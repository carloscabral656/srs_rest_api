<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Exception\Exception;

class ServiceAbstract
{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        try{
            if(is_array($data))
                return $this->model->create($data);
        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null, $columns = ['*'])
    {
        if(!is_null($id)) return $this->model->where('id', $id)->first($columns);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $id)
    {
        try{
            $resource = $this->show($id);
            return $resource->update($data);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data  = $this->show($id);
        $data->delete();
    }
}
