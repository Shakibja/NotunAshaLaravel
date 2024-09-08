<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\PostNews;
use App\Models\Backend\NewsAds;
use App\Models\Backend\Category;
use App\Models\Backend\Author;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class PostNewsController extends Controller
{
    public function index(){
        $news_author = Author::where("author_status", 1)->get();
        $news_category = Category::where("category_status", 1)->get();
        return view('backend.pages.postnews.index', compact('news_author','news_category'));
    }

    public function add_banner_page(){
        // return view('backend.pages.postnews.index', compact('news_author','news_category'));
        return view('backend.pages.postnews.banner_add');
    }

    public function upload(Request $request){

        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalExtension();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = rand().'_'.$originName.'.'.$extension;
            $request->file('upload')->move(public_path('backend/images/news-inimages'),$fileName);
            $url = asset('backend/images/news-inimages/'.$fileName);
            return response()->json([
                'fileName'=> $fileName,  
                'uploaded'=> 1,
                'url'=> $url,
            ]);
            // $innerImagePath = public_path('techworldbd_news_images/inner_images/'.$customInnerImageName);
        }
    }

    public function store(Request $request){
        $post_news = new PostNews();
        $validetData = $request->validate([
            'news_headline' => 'required|string',
            'news_keywords' => 'nullable|string|max:300',
            'news_shoulder' => 'nullable|string|max:255',
            'news_highlights' => 'nullable|string|max:5000',
            'news_body' => 'required|string',
            'category_slug' => 'required|string|exists:categories,category_slug',
            'news_title_image' => 'required|image|max:2048',
            'title_image_courtecy' => 'required|string',
            'inner_news_image' => 'nullable|image|max:2048',
            'inner_image_courtecy' => 'nullable|string',
            'inner_image_para_no' => 'nullable|integer',
            'author_id' => 'required|integer|exists:authors,author_id',
            'news_status' => 'required|string',
            'elected_status' => 'nullable',
            'tot_status' => 'nullable',
            'lead_news_status' => 'nullable',
        ]);
        if($post_news){
            $post_news->news_id = $request->news_id;
            $post_news->news_headline = $validetData['news_headline'];
            $post_news->news_shoulder = $validetData['news_shoulder'];
            $post_news->news_keywords = $validetData['news_keywords'];
            $post_news->news_highlights = $validetData['news_highlights'];
            $post_news->news_body = $validetData['news_body'];
            $post_news->category_slug = $request->category_slug;
            if($request->news_title_image){
                // $titleImage = $request->file('news_title_image');
                // $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
                // $titleImagePath = public_path('backend/images/news-himages/'.$customTitleImage);
                // Image::make($titleImage)->save($titleImagePath);
                // $post_news->news_title_image = $customTitleImage;

                $titleImage = $request->file('news_title_image');
                $customTitleImage = rand().'.'.$titleImage->extension();
                $titleImage->move(public_path('backend/images/news-himages/'), $customTitleImage);
                $post_news->news_title_image = $customTitleImage;
            }
            $post_news->title_image_courtecy = $validetData['title_image_courtecy'];
            if($request->inner_news_image){
                // $innerImage = $request->file('inner_news_image');
                // $customInnerImageName = rand().'.'.$innerImage->getClientOriginalExtension();
                // $innerImagePath = public_path('backend/images/news-inimages/'.$customInnerImageName);
                // Image::make($innerImage)->save($innerImagePath);
                // $post_news->inner_news_image = $customInnerImageName;


                $innerImage = $request->file('inner_news_image');
                $customInnerImageName = rand().'.'.$innerImage->extension();
                $innerImage->move(public_path('backend/images/news-inimages/'), $customInnerImageName);
                $post_news->inner_news_image = $customInnerImageName;
            }
            // $post_news->inner_image_courtecy = $validetData['inner_image_courtecy'];
            // $post_news->inner_image_para_no = $validetData['inner_image_para_no'];
            $post_news->author_id = $validetData['author_id'];
            $post_news->news_status = $validetData['news_status'];
            if($request->elected_status){
                $post_news->elected_status = $validetData['elected_status'];
            }
            if($request->tot_status){
                $post_news->tot_status = $validetData['tot_status'];
            }
            if($request->lead_news_status){
                $post_news->lead_news_status = $validetData['lead_news_status'];
            }
            // $post_news->slug = $request->category_slug.'/news-'.$request->news_id;
            $post_news->slug = Str::slug($request->input('news_headline'));
            $post_news->auth_id = Auth::User()->id;
            $post_news->save();
            // return redirect()->back()->with('add_news_success','News Uploaded Successfulli !');
            return redirect()->route('manage_news_page')->with('add_news_success','News Uploaded Successfulli !');
        }
        else{
            return redirect()->back()->with('add_news_failed','News Uploaded Failed !');
        }
    }


    public function banner_store(Request $request)
    {
            $banner = new NewsAds();
            
            $banner->date = $request->date;

            if ($request->file('m_banner_1')) {
                $image = $request->file('m_banner_1');
                $m_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_banner_1);
                $banner->m_banner_1 = $m_banner_1;
            }

            if ($request->file('m_right_banner_1')) {
                $image = $request->file('m_right_banner_1');
                $m_right_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_right_banner_1);
                $banner->m_right_banner_1 = $m_right_banner_1;
            }


            if ($request->file('m_right_banner_2')) {
                $image = $request->file('m_right_banner_2');
                $m_right_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_right_banner_2);
                $banner->m_right_banner_2 = $m_right_banner_2;
            }


            if ($request->file('m_banner_2')) {
                $image = $request->file('m_banner_2');
                $m_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_banner_2);
                $banner->m_banner_2 = $m_banner_2;
            }

            if ($request->file('m_banner_3')) {
                $image = $request->file('m_banner_3');
                $m_banner_3 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_banner_3);
                $banner->m_banner_3 = $m_banner_3;
            }

            if ($request->file('d_banner_1')) {
                $image = $request->file('d_banner_1');
                $d_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $d_banner_1);
                $banner->d_banner_1 = $d_banner_1;
            }

            if ($request->file('d_banner_2')) {
                $image = $request->file('d_banner_2');
                $d_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $d_banner_2);
                $banner->d_banner_2 = $d_banner_2;
            }

            if ($request->file('d_banner_3')) {
                $image = $request->file('d_banner_3');
                $d_banner_3 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $d_banner_3);
                $banner->d_banner_3 = $d_banner_3;
            }

            if ($request->file('nc_banner_1')) {
                $image = $request->file('nc_banner_1');
                $nc_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $nc_banner_1);
                $banner->nc_banner_1 = $nc_banner_1;
            }

            if ($request->file('nc_banner_2')) {
                $image = $request->file('nc_banner_2');
                $nc_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $nc_banner_2);
                $banner->nc_banner_2 = $nc_banner_2;
            }


            $banner->save();

        return back()->with('category_success', 'Added Successfully !');
    }

    // View Page
    public function view(){
        // $post_news_data = PostNews::all();
        $post_news_datas = PostNews::orderBy('news_id', 'desc')->paginate(100);
        return view('backend.pages.postnews.manage', compact('$post_news_datas'));
    }

    public function banner_view(){
        // $post_news_data = PostNews::all();
        $banner_view = NewsAds::orderBy('id', 'asc')->get();
        // dd($banner_view);
        return view('backend.pages.postnews.banner_view', compact('banner_view'));
    }

    // Edit Page
    public function edit($slug){
        $post_news_data = PostNews::where('slug', $slug)->first();
        $author = Author::where("author_status", 1)->get();
        $category = Category::where("category_status", 1)->get();
        return view('backend.pages.postnews.edit', compact('post_news_data', 'category', 'author'));
    }


    public function edit_banner($id){
        $post_news_data = NewsAds::where('id', $id)->first();
        // dd($post_news_data);
        // $author = Author::where("author_status", 1)->get();
        // $category = Category::where("category_status", 1)->get();
        return view('backend.pages.postnews.edit_banner',compact('post_news_data'));
    }

    // Delete News
    public function delete($slug){
        $post_news_data = PostNews::where('slug', $slug)->first();
        
        if($post_news_data){
            if (File::exists('backend/images/news-himages/'.$post_news_data->news_title_image)) {
                File::delete('backend/images/news-himages/'.$post_news_data->news_title_image);
            }
            if (File::exists('backend/images/news-inimages/'.$post_news_data->inner_news_image)) {
                File::delete('backend/images/news-inimages/'.$post_news_data->inner_news_image);
            }
        }
        $post_news_data->delete();
        return redirect()->back()->with('delete_news_success', 'Delete Successfully !');
    }


    public function delete_banner($id){
        $delete_banner = NewsAds::where('id', $id)->first();

        
        if($delete_banner){
            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->m_banner_1)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->m_banner_1);
            }
            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->m_right_banner_1)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->m_right_banner_1);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->m_right_banner_2)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->m_right_banner_2);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->m_banner_2)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->m_banner_2);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->m_banner_3)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->m_banner_3);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->d_banner_1)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->d_banner_1);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->d_banner_2)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->d_banner_2);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->d_banner_3)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->d_banner_3);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->nc_banner_1)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->nc_banner_1);
            }

            if (File::exists('backend/images/e-paper-page/banner/'.$delete_banner->nc_banner_2)) {
                File::delete('backend/images/e-paper-page/banner/'.$delete_banner->nc_banner_2);
            }
        }
        $delete_banner->delete();
        return redirect()->back()->with('delete_news_success', 'Delete Successfully !');
    }








    // Update News
    public function update(Request $request, $slug){
        $post_news = PostNews::where('slug', $slug)->first();

        $validetData = $request->validate([
            'news_headline' => 'required|string',
            'news_keywords' => 'nullable|string|max:300',
            'news_shoulder' => 'nullable|string|max:255',
            'news_highlights' => 'nullable|string|max:5000',
            'news_body' => 'required|string',
            'category_slug' => 'required|string|exists:categories,category_slug',
            'news_title_image' => 'nullable|image|max:2048',
            'title_image_courtecy' => 'required|string',
            'inner_news_image' => 'nullable|image|max:2048',
            'inner_image_courtecy' => 'nullable|string',
            'inner_image_para_no' => 'nullable|integer',
            'author_id' => 'required|integer|exists:authors,author_id',
            'news_status' => 'required|string',
            'elected_status' => 'nullable',
            'tot_status' => 'nullable',
            'lead_news_status' => 'nullable',
        ]);

        if($post_news){
            $post_news->news_headline = $validetData['news_headline'];
            $post_news->news_shoulder = $validetData['news_shoulder'];
            $post_news->news_keywords = $validetData['news_keywords'];
            $post_news->news_highlights = $validetData['news_highlights'];
            $post_news->news_body = $validetData['news_body'];
            $post_news->category_slug = $request->category_slug;

            // Update Headline Image
            if(!empty($request->news_title_image)){
                if(File::exists('backend/images/news-himages/'.$post_news->news_title_image)){
                    File::delete('backend/images/news-himages/'.$post_news->news_title_image);
                }

                if($request->news_title_image){
                    // $titleImage = $request->file('news_title_image');
                    // $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
                    // $titleImagePath = public_path('backend/images/news-himages/'.$customTitleImage);
                    // Image::make($titleImage)->save($titleImagePath);
                    // $post_news->news_title_image = $customTitleImage;

                    $titleImage = $request->file('news_title_image');
                    $customTitleImage = rand().'.'.$titleImage->extension();
                    $titleImage->move(public_path('backend/images/news-himages/'), $customTitleImage);
                    $post_news->news_title_image = $customTitleImage;
                }
            }

            $post_news->title_image_courtecy = $validetData['title_image_courtecy'];

            // Update Inner Image
            if(!empty($request->inner_news_image)){
                if(File::exists('backend/images/news-inimages/'.$post_news->inner_news_image)){
                    File::delete('backend/images/news-inimages/'.$post_news->inner_news_image);
                }
                if($request->inner_news_image){
                    // $innerImage = $request->file('inner_news_image');
                    // $customInnerImageName = rand().'.'.$innerImage->getClientOriginalExtension();
                    // $innerImagePath = public_path('backend/images/news-inimages/'.$customInnerImageName);
                    // Image::make($innerImage)->save($innerImagePath);
                    // $post_news->inner_news_image = $customInnerImageName;

                    $innerImage = $request->file('inner_news_image');
                    $customInnerImageName = rand().'.'.$innerImage->extension();
                    $innerImage->move(public_path('backend/images/news-inimages/'), $customInnerImageName);
                    $post_news->inner_news_image = $customInnerImageName;
                }
            }

            // $post_news->inner_image_courtecy = $validetData['inner_image_courtecy'];
            // $post_news->inner_image_para_no = $validetData['inner_image_para_no'];
            $post_news->author_id = $validetData['author_id'];
            $post_news->news_status = $validetData['news_status'];
            
            if($request->has('elected_status')){
                $post_news->elected_status = $validetData['elected_status'];
            }
            else{
                $post_news->elected_status = NULL;
            }
            if($request->has('tot_status')){
                $post_news->tot_status = $validetData['tot_status'];
            }
            else{
                $post_news->tot_status = NULL;
            }
            if($request->has('lead_news_status')){
                $post_news->lead_news_status = $validetData['lead_news_status'];
            }
            else{
                $post_news->lead_news_status = NULL;
            }
            
            // $post_news->slug = $request->category_slug.'/news-'.$request->news_id;
            $post_news->slug = Str::slug($request->input('news_headline'));
            $post_news->auth_id = Auth::User()->id;
            $post_news->update();

            return redirect()->route('manage_news_page')->with('update_news_success','News Uploaded Successfully !');
        }
        else{
            return redirect()->back()->with('update_news_failed','News Uploaded Failed !');
        }
    }


    public function update_banner(Request $request, $id)
    {
            $banner = NewsAds::findOrFail($id);
            // dd($banner);
            
            $banner->date = $request->date;

            if ($request->file('m_banner_1')) {
                $image = $request->file('m_banner_1');
                $m_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_banner_1);
                $banner->m_banner_1 = $m_banner_1;
            }

            if ($request->file('m_right_banner_1')) {
                $image = $request->file('m_right_banner_1');
                $m_right_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_right_banner_1);
                $banner->m_right_banner_1 = $m_right_banner_1;
            }


            if ($request->file('m_right_banner_2')) {
                $image = $request->file('m_right_banner_2');
                $m_right_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_right_banner_2);
                $banner->m_right_banner_2 = $m_right_banner_2;
            }


            if ($request->file('m_banner_2')) {
                $image = $request->file('m_banner_2');
                $m_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_banner_2);
                $banner->m_banner_2 = $m_banner_2;
            }

            if ($request->file('m_banner_3')) {
                $image = $request->file('m_banner_3');
                $m_banner_3 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $m_banner_3);
                $banner->m_banner_3 = $m_banner_3;
            }

            if ($request->file('d_banner_1')) {
                $image = $request->file('d_banner_1');
                $d_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $d_banner_1);
                $banner->d_banner_1 = $d_banner_1;
            }

            if ($request->file('d_banner_2')) {
                $image = $request->file('d_banner_2');
                $d_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $d_banner_2);
                $banner->d_banner_2 = $d_banner_2;
            }

            if ($request->file('d_banner_3')) {
                $image = $request->file('d_banner_3');
                $d_banner_3 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $d_banner_3);
                $banner->d_banner_3 = $d_banner_3;
            }

            if ($request->file('nc_banner_1')) {
                $image = $request->file('nc_banner_1');
                $nc_banner_1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $nc_banner_1);
                $banner->nc_banner_1 = $nc_banner_1;
            }

            if ($request->file('nc_banner_2')) {
                $image = $request->file('nc_banner_2');
                $nc_banner_2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/banner'), $nc_banner_2);
                $banner->nc_banner_2 = $nc_banner_2;
            }


            $banner->update();

        return redirect()->route('banner_view')->with('update_news_success','News Uploaded Successfully !');
    }
}