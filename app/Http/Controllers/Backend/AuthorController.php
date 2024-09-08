<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Author;
use Intervention\Image\ImageManagerStatic as Image;


class AuthorController extends Controller
{
    public function index(){
        $author = Author::all();
        return view('backend.pages.author.index', compact("author"));
    }

    // Insert
    public function store(Request $request)
    {
        $validetData = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|max:255|email|unique:authors,author_email',
            'author_phone_no' => 'required|min:11|max:11|string|unique:authors,author_phone_no',
            'author_status' => 'required|string',
        ]);

        $author = new Author();
        if($author){
            $author->author_id = $request->author_id;
            $author->author_name = $validetData['author_name'];
            $author->author_email = $validetData['author_email'];
            $author->author_phone_no = $validetData['author_phone_no'];
            $author->author_status = $validetData['author_status'];
            $author->save();

            return back()->with('author_success', 'Added Successfully !');
        }
        else{
            return back()->with('author_faield', 'Faild to Insert !');
        }
    }

    // Delete
    public function delete($id){
        $author = Author::find($id);
        if($author){
            $author->delete();
            return back()->with('del_author_success', 'Deleted Successfully !');
        }
        else{
            return back()->with('del_author_faield', 'Faild to Delete !');
        }
    }

    // Bring Data into Modal
    public function edit($id)
    {
        $author = Author::find($id);
        return view('backend.pages.author.index', compact("author"));
    }

    // Update
    public function update(Request $request, $id){
        $validetData = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|max:255|email',
            'author_phone_no' => 'required|min:11|max:11|string',
            'author_status' => 'required|string',
        ]);

        $author = Author::find($id);
        if($author){
            $author->author_name = $validetData['author_name'];
            $author->author_email = $validetData['author_email'];
            $author->author_phone_no = $validetData['author_phone_no'];
            $author->author_status = $validetData['author_status'];
            $author->update();

            return back()->with('up_author_success', 'Updated Successfully !');
        }
        else{
            return back()->with('up_author_faield', 'Faild to Update !');
        }
    }
}
