<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserValidationController extends Controller
{
    public function validateUser($identifier)
    {
        try {
            $user = User::where('name', $identifier)
                        ->orWhere('email', $identifier)
                        ->firstOrFail();

            return response()->json([
                'fulfillment_response' => [
                    'messages' => [
                        [
                            'text' => [
                                'text' => ["valid"]
                            ]
                        ]
                    ]
                ]
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'fulfillment_response' => [
                    'messages' => [
                        [
                            'text' => [
                                'text' => ["not found"]
                            ]
                        ]
                    ]
                ]
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'fulfillment_response' => [
                    'messages' => [
                        [
                            'text' => [
                                'text' => ["server error"]
                            ]
                        ]
                    ]
                ]
            ], 500);
        }
    }
}
