<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Category Page
    public function index(){
        // $category = Category::all();
        $category = Category::orderBy('priority', 'asc')->get();
        return view('backend.pages.category.index', compact("category"));
    }

    // Insert
    public function store(Request $request)
    {
        $priority = $request->priority;
        // dd($priority);

        // Check if a record with the same priority exists
        $existingRecord = Category::where('priority', $priority)->first();
        // dd($existingRecord);

        if ($existingRecord) {
            // If a record with the same priority exists, return an error
            return response()->json(['error' => 'Priority must be unique'], 422);
        } else {
            // Proceed with the insertion
            $validetData = $request->validate([
                'category_name' => 'required|string|max:255',
                'category_slug' => 'required|string',
                'category_status' => 'required|string',
            ]);

            $category = new Category();

            $category->category_name = $validetData['category_name'];
            $category->category_slug = $validetData['category_slug'];
            $category->category_status = $validetData['category_status'];
            $category->priority = $request->priority;
            $category->save();

            return back()->with('category_success', 'Added Successfully !');
        
          
        }
        

        // $validetData = $request->validate([
        //     'category_name' => 'required|string|max:255',
        //     'category_slug' => 'required|string',
        //     'category_status' => 'required|string',
        //     'priority' => 'required|numeric',
        // ]);

        

        // $category = new Category();
        // if($category){
        //     // $category->category_id = $request->category_id;
        //     $category->category_name = $validetData['category_name'];
        //     $category->category_slug = $validetData['category_slug'];
        //     $category->category_status = $validetData['category_status'];
        //     $category->priority = $validetData['priority'];
        //     $category->save();

        //     return back()->with('category_success', 'Added Successfully !');
        // }
        // else{
        //     return back()->with('category_faield', 'Faild to Insert !');
        // }
    }

    // Delete
    public function delete($category_slug){
        $category = Category::find($category_slug);
        if($category){
            $category->delete();
            return back()->with('del_category_success', 'Deleted Successfully !');
        }
        else{
            return back()->with('del_category_faield', 'Faild to Delete !');
        }
    }

    // Bring Data into Modal
    public function edit($category_slug)
    {
        $category = Category::find($category_slug);
        return view('backend.pages.category.index', compact("category"));
    }

    // Update
    public function update(Request $request, $category_slug){
        $priority = $request->priority;
        // dd($priority);

        // Check if a record with the same priority exists
        $existingRecord = Category::where('priority', $priority)->first();
        // dd($existingRecord);

        if ($existingRecord) {
            // If a record with the same priority exists, return an error
            return response()->json(['error' => 'Priority must be unique'], 422);
        } else {
            // Proceed with the insertion
            $validetData = $request->validate([
                'category_name' => 'required|string|max:255',
                'category_slug' => 'required|string',
                'category_status' => 'required|string',
            ]);

            $category = Category::find($category_slug);

            $category->category_name = $validetData['category_name'];
            $category->category_slug = $validetData['category_slug'];
            $category->category_status = $validetData['category_status'];
            $category->priority = $request->priority;
            $category->update();

            return back()->with('up_category_success', 'Updated Successfully !');
        
          
        }




        // $validetData = $request->validate([
        //     'category_name' => 'required|string|max:255',
        //     'category_slug' => 'required|string',
        //     'category_status' => 'required|string',
        // ]);

        // $category = Category::find($category_slug);
        // if($category){
        //     $category->category_name = $validetData['category_name'];
        //     $category->category_slug = $validetData['category_slug'];
        //     $category->category_status = $validetData['category_status'];
        //     $category->priority = $request->priority;
        //     $category->update();

        //     return back()->with('up_category_success', 'Updated Successfully !');
        // }
        // else{
        //     return back()->with('up_category_faield', 'Faild to Update !');
        // }
    }
}
