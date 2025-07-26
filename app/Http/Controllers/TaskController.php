<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks(Request $request)
    {
        $uid = $request->uid;

        // Dummy data (or fetch from Firebase SDK)
        return response()->json([
            [
                'title' => 'Task 1',
                'description' => 'Complete the frontend',
                'status' => 'pending'
            ],
            [
                'title' => 'Task 2',
                'description' => 'Integrate API',
                'status' => 'completed'
            ]
        ]);
    }
}
