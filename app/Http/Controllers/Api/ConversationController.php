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
}
