<?php

namespace App\Http\Controllers;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Categories;
use App\Models\Networks;
use Illuminate\Http\Request;
use App\Models\Stores;
use Illuminate\Support\Facades\Validator;

class StoresController extends Controller
{


        public function top_store() {
        // Fetch all stores with their respective categories
        $storesByCategory = Stores ::table('stores')
        ->select('category', Categories::raw('count(*) as total'))
        ->groupBy('category')
        ->get();

        return view('blog', compact('storesByCategory'));
        }
        public function store() {
        $stores = Stores::get();

        return view('admin.stores.index', compact('stores'));
        }

        public function create_store() {
        $categories = Categories::all();
        $networks = Networks::all();
        return view('admin.stores.create', compact('categories', 'networks'));
        }

        public function store_store(Request $request) {
        if ($request->hasFile('store_image')) {
        $file = $request->file('store_image');
        $StoreImageName = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

        // Resize and compress the image
        $image = Image::make($file->getRealPath());

        // Resize the image to a width of 300 and constrain aspect ratio (auto height)
        $image->resize(300, null, function ($constraint) {
        $constraint->aspectRatio();
        });

        // Save the image with compression (90% quality)
        $image->save(public_path('/uploads/stores/' . $StoreImageName), 90);
        }

        Stores::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'url' => $request->url,
        'destination_url' => $request->destination_url,
        'category' => $request->category,
        'title' => $request->title,
        'meta_tag' => $request->meta_tag,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description,
        'status' => $request->status,
        'authentication' => isset($request->authentication) ? $request->authentication : "No Auth",
        'network' => $request->network,
        'store_image' => isset($StoreImageName) ? $StoreImageName : "No Store Image",
        ]);

        return redirect()->back()->with('success', 'Store Created Successfully');
        }

        public function edit_store($id) {
        $stores = Stores::find($id);
        $categories = Categories::all();
        $networks = Networks::all();
        return view('admin.stores.edit', compact('stores', 'categories', 'networks'));
        }

        public function update_store(Request $request, $id)
        {
        $stores = Stores::findOrFail($id);

        $validator = Validator::make($request->all(), [
        'title' => 'nullable|string|max:65',
        'meta_tag' => 'nullable|string|max:255',
        'meta_keyword' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|between:70,155',
        ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }

        $StoreImage = $stores->store_image;

        if ($request->hasFile('store_image')) {
        $file = $request->file('store_image');
        $StoreImage = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/stores'), $StoreImage);
        // Delete the previous image if it exists
        if ($stores->store_image && file_exists(public_path('uploads/stores/' . $stores->store_image))) {
        unlink(public_path('uploads/stores/' . $stores->store_image));
        }
        }

        $stores->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'url' => $request->url,
        'destination_url' => $request->destination_url,
        'category' => $request->category ?? $stores->category,
        'title' => $request->title,
        'meta_tag' => $request->meta_tag,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description,
        'status' => $request->status,
        'authentication' => $request->authentication ?? "No Auth",
        'network' => $request->network ?? $stores->network,
        'store_image' => $StoreImage,
        ]);

        return redirect()->back()->with('success', 'Store Updated Successfully');
        }
        public function delete_store($id) {
        Stores::find($id)->delete();
        return redirect()->back()->with('success', 'Store Deleted Successfully');
        }
        public function deleteSelected(Request $request)
        {
        $storeIds = $request->input('selected_stores');

        if ($storeIds) {
        // Delete only the stores
        Stores::whereIn('id', $storeIds)->delete();

        return redirect()->back()->with('success', 'Selected stores deleted successfully');
        } else {
        return redirect()->back()->with('error', 'No stores selected for deletion');
        }
        }


}
