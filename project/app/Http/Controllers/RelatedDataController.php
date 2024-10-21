<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YourController extends Controller
{
    public function loadRelatedData(Request $request)
    {
        $resourceId = $request->input('resourceId');
        $resourceName = $request->input('resourceName');

        // Fetch the related data based on resourceId and resourceName
        $relatedData = // ... your logic to fetch data ...

        return response()->json($relatedData);
    }
}
