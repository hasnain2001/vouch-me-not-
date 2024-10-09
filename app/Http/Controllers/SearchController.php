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
        $stores = Stores::where('name', 'like', "$query%")->paginate(15);
        $stores->appends(['query' => $query]);
        $store = Stores::where('name', $query)->first();
        if ($store) {
       
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
