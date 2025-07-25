<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    public function getTasks(Request $request)
    {
        $uid = $request->uid;

        $firebase = (new Factory)
            ->withServiceAccount(base_path('firebase-key.json')) // JSON key path
            ->withDatabaseUri('https://YOUR_PROJECT.firebaseio.com'); // Not needed for Firestore only

        $firestore = $firebase->createFirestore()->database();

        $collection = $firestore->collection('tasks');
        $documents = $collection->where('uid', '=', $uid)->documents();

        $tasks = [];

        foreach ($documents as $doc) {
            if ($doc->exists()) {
                $tasks[] = $doc->data();
            }
        }

        return response()->json($tasks);
    }
}
