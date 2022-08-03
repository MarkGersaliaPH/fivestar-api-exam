<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConversationRequest;
use Illuminate\Support\Str;
class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $allRequest)
    {
      
 
        $response = [];
        $allRequest = collect($allRequest->all());
        $allRequest = $allRequest->filter(); 
        
        if(!$allRequest->has('message') || !$allRequest->has('conversation_id')){
            if(!$allRequest->get('message') || !$allRequest->has('conversation_id'))
            return response()->json([
                'message' => 'Invalid json format'
            ], 400);
        }
        if($allRequest->has('conversation_id')){
            
        $response['response_id'] = $allRequest->get('conversation_id');

        } 
        if($allRequest->has('message')){
            $message = '';
            if(Str::contains($allRequest->get('message'),['Hello','Hi'])){
                $response['response'] = 'Welcome to StationFive.';
            }elseif(Str::contains($allRequest->get('message'),['Goodbye','bye'])){ 
                $response['response'] = 'Thank you, see you around.';
            }else{
                $response['response'] = 'Sorry, I don’t understand.';
            }
        }
        return response()->json($response);
        
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
     * @param  \Illuminate\Http\Request  $allRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $allRequest)
    {
        //
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
     * @param  \Illuminate\Http\Request  $allRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $allRequest, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
