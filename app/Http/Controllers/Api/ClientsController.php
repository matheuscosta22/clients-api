<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{

    /**
* @OA\Info(
*     title="List of clients",
*     version="1.0.0",
*     description="Api rest in laravel to register clients and save contacts",
*     @OA\Contact(
*       name="Matheus Costa",
*       url="linkedin.com/in/matheus-costa-ba6090201/",    
*       email="mcostadesantana2539@gmail.com",
* )
* )
*/

// http methods



/**
     * @OA\Post(path="/api-clients/public/api/clients/add",
     *   tags={"clients"},
     *   summary="Create client",
     *   description="creates and saves client contacts",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Created client",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(@OA\Property(property="name", type="string", example="matheus"),
     *                      @OA\Property(property="phone", type="string", example="986547654"),
     *                      @OA\Property(property="email", type="string", example="email@exemp.com"),
     * )
     *       )
     *   ),
     *   @OA\Response(response="default", description="")
     * )
     */
    public function add(Request $request){

        try{
            $client = new Client();
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->email = $request->email;

            $client->save();
            return $client;

        }catch(\Exception $erro){
            return $erro;
        }
    }


 /**
     * @OA\Get(
     *      path="/api-clients/public/api/clients",
     *      operationId="",
     *      tags={"clients"},
     *      summary="get list of clients and their contacts",
     *      description="Returns list of clients",
     *     @OA\Response(response="default", description="")
     *     )
     */
    public function list(){

        $client = Client::all();

        return $client;
    }


/**
     * @OA\Get(
     *      path="/api-clients/public/api/clients/{id}",
     *      operationId="",
     *      tags={"clients"},
     *      summary="get client with this id",
     *      description="get the customer with that id and their contacts",
     *      *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="client id",
     *     required=true,
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *     @OA\Response(response="default", description="")
     *     )
     */
    public function select($id){
        $client = Client::find($id);
        return $client;
    }



	/**
     * @OA\PUT(path="/api-clients/public/api/clients/{id}",
     *   tags={"clients"},
     *   summary="Update client",
     *   description="update the client with the given id",
     *    @OA\Parameter(
     *          name="id",
     *          description="client id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *   @OA\RequestBody(
     *       required=true,
     *       description="Updated client",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(@OA\Property(property="name", type="string", example="matheus"),
     *                      @OA\Property(property="phone", type="string", example="986547654"),
     *                      @OA\Property(property="email", type="string", example="email@exemp.com"),
     * )
     *       )
     *   ),
     *   @OA\Response(response="default", description="")
     * )
     */
    public function update(Request $request, $id){
        try{
            $client = Client::find($id);

            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->email = $request->email;

            $client->save();
            return ['updated successfully!', $client];
        }catch(\Exception $erro){
            return $erro;
        }
    }



    /**
     * @OA\Delete(path="/api-clients/public/api/clients/{id}",
     *   tags={"clients"},
     *   summary="Delete user",
     *   description="",
     *   operationId="",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="The client with this id will be deleted",
     *     required=true,
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *   @OA\Response(response=200, description="successful operation"),
     *   @OA\Response(response=406, description="not acceptable"),
     *   @OA\Response(response=500, description="internal server error")
     * )
     */
    public function delete($id){
        try{

            $client = Client::find($id);
            $client->delete();
            return ['successfully deleted'];
        }catch(\Exception $erro){
            return $erro;
        }
    }
}
