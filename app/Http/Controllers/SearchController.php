<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SearchController extends Controller
{


    public function search(Request $request) {
        $query = $request->input('query');

        // Fetch stores matching the query with pagination (15 results per page)
        $stores = Stores::where('name', 'like', "$query%")->paginate(15);

        // Append the query string to pagination links
        $stores->appends(['query' => $query]);

        // Check if there is a single store matching the query exactly
        $store = Stores::where('name', $query)->first();

        if ($store) {
            // If a single store is found, redirect to its details page
            return redirect()->route('store_details', ['slug' => Str::slug($store->slug)]);
        }

        return view('search_results', ['stores' => $stores, 'query' => $query]);
    }








public function searchSuggestions(Request $request)
{
    $query = $request->input('query');
    $relatedSearches = Stores::where('name', 'like', $query . '%')->pluck('name')->toArray();
    return response()->json(['relatedSearches' => $relatedSearches]);
}


}
