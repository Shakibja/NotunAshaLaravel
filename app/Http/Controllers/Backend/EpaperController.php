<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\EpaperPage;
use App\Models\Backend\EpaperColumn;
use App\Models\Backend\EpaperAds;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EpaperController extends Controller
{
    public function index()
    {
        return view('backend.pages.e_paper.index');
    }

    public function epaper_column($date, $page_number)
    {
        $page = EpaperPage::where('date',$date )->where('page_number',$page_number)->first();
        // dd($page);
        $e_paper_column = EpaperColumn::where('date',$date )->where('page_number',$page_number )->get();
        return view('backend.pages.e_paper.epaper_column',compact('page','e_paper_column'));
    }

    public function epaper_ads()
    {
        return view('backend.pages.e_paper.epaper_ads');
    }

    public function store(Request $request)
    {
        $info = EpaperPage::where('date', $request->date)->latest()->first();
        if (isset($info)) {
            return back()->with('category_success', 'Already Added On this Date!');
        }


        if ($request->page_number1 && $request->page_image1) {
            $page = new EpaperPage();
            $page->date = $request->date;
            
            $page->page_number = $request->page_number1;

            if ($request->file('page_image1')) {
                $image = $request->file('page_image1');
                $page_image1 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image1);
                $page->page_image = $page_image1;
            }

            $page->save();
        }
        if ($request->page_number2 && $request->page_image2) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number2;

            if ($request->file('page_image2')) {
                $image = $request->file('page_image2');
                $page_image2 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image2);
                $page->page_image = $page_image2;
            }

            $page->save();
        }
        if ($request->page_number3 && $request->page_image3) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number3;

            if ($request->file('page_image3')) {
                $image = $request->file('page_image3');
                $page_image3 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image3);
                $page->page_image = $page_image3;
            }

            // if ($request->page_image3) {
            //     $titleImage = $request->file('page_image3');
            //     $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
            //     $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
            //     Image::make($titleImage)->save($titleImagePath);
            //     $page->page_image = $customTitleImage;
            // }
            $page->save();
        }
        if ($request->page_number4 && $request->page_image4) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number4;

            if ($request->file('page_image4')) {
                $image = $request->file('page_image4');
                $page_image4 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image4);
                $page->page_image = $page_image4;
            }


            // if ($request->page_image4) {
            //     $titleImage = $request->file('page_image4');
            //     $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
            //     $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
            //     Image::make($titleImage)->save($titleImagePath);
            //     $page->page_image = $customTitleImage;
            // }
            $page->save();
        }

        if ($request->page_number5 && $request->page_image5) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number5;

            if ($request->file('page_image5')) {
                $image = $request->file('page_image5');
                $page_image5 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image5);
                $page->page_image = $page_image5;
            }

            $page->save();
        }

        if ($request->page_number6 && $request->page_image6) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number6;

            if ($request->file('page_image6')) {
                $image = $request->file('page_image6');
                $page_image6 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image6);
                $page->page_image = $page_image6;
            }


            
            $page->save();
        }

        if ($request->page_number7 && $request->page_image7) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number7;

            if ($request->file('page_image7')) {
                $image = $request->file('page_image7');
                $page_image7 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image7);
                $page->page_image = $page_image7;
            }

           
            $page->save();
        }

        if ($request->page_number8 && $request->page_image8) {
            $page = new EpaperPage();
            $page->date = $request->date;
            $page->page_number = $request->page_number8;

            if ($request->file('page_image8')) {
                $image = $request->file('page_image8');
                $page_image8 = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/'), $page_image8);
                $page->page_image = $page_image8;
            }


            $page->save();
        }


//        $e_paper = New EpaperPage();
//        $e_paper->date = $request->date;
//        $e_paper->page_number1 = $request->page_number1;
//        $e_paper->page_number2 = $request->page_number2;
//        $e_paper->page_number3= $request->page_number3;
//        $e_paper->page_number4 = $request->page_number4;
//        $e_paper->page_number5 = $request->page_number5;
//        $e_paper->page_number6 = $request->page_number6;
//        $e_paper->page_number7 = $request->page_number7;
//        $e_paper->page_number8 = $request->page_number8;
//
//        if($request->page_image1){
//            $titleImage = $request->file('page_image1');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image1 = $customTitleImage;
//        }
//        if($request->page_image2){
//            $titleImage = $request->file('page_image2');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image2 = $customTitleImage;
//        }
//        if($request->page_image3){
//            $titleImage = $request->file('page_image3');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image3 = $customTitleImage;
//        }
//        if($request->page_image4){
//            $titleImage = $request->file('page_image4');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image4 = $customTitleImage;
//        }
//        if($request->page_image5){
//            $titleImage = $request->file('page_image5');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image5 = $customTitleImage;
//        }
//        if($request->page_image6){
//            $titleImage = $request->file('page_image6');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image6 = $customTitleImage;
//        }
//        if($request->page_image7){
//            $titleImage = $request->file('page_image7');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image7 = $customTitleImage;
//        }
//        if($request->page_image8){
//            $titleImage = $request->file('page_image8');
//            $customTitleImage = rand().'.'.$titleImage->getClientOriginalExtension();
//            $titleImagePath = public_path('backend/images/e-paper-page/'.$customTitleImage);
//            Image::make($titleImage)->save($titleImagePath);
//            $e_paper->page_image8 = $customTitleImage;
//        }
//
//        $e_paper->save();
        return back()->with('category_success', 'Added Successfully !');
    }



    public function store_epaper_column(Request $request)
    {
            $epaper_column = new EpaperColumn();
            
            $epaper_column->date = $request->date;
            $epaper_column->page_number = $request->page_number;
            $epaper_column->column_number = $request->column_number;
            $epaper_column->height = $request->height1.'px';
            $epaper_column->width = $request->width1.'px';
            $epaper_column->top = $request->top1.'px';
            $epaper_column->bottom = $request->left1.'px';
            $epaper_column->column_desc = $request->desc;

            if ($request->file('profile_image')) {
                $manager = new ImageManager(new Driver());
                //get filename with extension
                $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
        
                // //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
                //get file extension
                $extension = $request->file('profile_image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
    
                // Storage::put('public/profile_images/'. $filenametostore, fopen($request->file('profile_image'), 'r+'));
                // Storage::put('public/profile_images/crop/'. $filenametostore, fopen($request->file('profile_image'), 'r+'));
    
                $img = $manager->read($request->file('profile_image'));
    
                // $cropimage = public_path('storage/profile_images/crop/'.$filenametostore);
                // dd($request->input('top'), $request->input('left'), $request->input('height'), $request->input('width'));
    
                $img = $img->crop(
                    $request->input('width'),  // Width
                    $request->input('height'), // Height
                    $request->input('left'),   // X-coordinate (left)
                    $request->input('top')     // Y-coordinate (top)
                );


                // $image =  $img->resize($request->width +200 , $request->height +200, function ($constraint) {
                //     $constraint->aspectRatio();
                //     $constraint->upsize();
                // });

                $image =  $img->resize($request->width, $request->height , function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
    
                $image->toPng()->save('backend/images/e-paper-page/'.$filenametostore);

                $epaper_column->column_image = $filenametostore;
            }

            // if ($request->file('column_image')) {
            //     $image = $request->file('column_image');
            //     $column_image = rand(1000,9999) . '.' . $image->extension();
            //     $image->move(public_path('backend/images/e-paper-page'), $column_image);
            //     $epaper_column->column_image = $column_image;
            // }


            $epaper_column->save();

        return back()->with('category_success', 'Added Successfully !');
    }


    public function store_epaper_ads(Request $request)
    {
            $epaper_ads = new EpaperAds();
            
            $epaper_ads->date = $request->date;
            $epaper_ads->ads_name = $request->ads_name;
            $epaper_ads->ads_links = $request->ads_links;
            $epaper_ads->priority = $request->priority;
            

            if ($request->file('ads_image')) {
                $image = $request->file('ads_image');
                $ads_image = rand(1000,9999) . '.' . $image->extension();
                $image->move(public_path('backend/images/e-paper-page/ads'), $ads_image);
                $epaper_ads->ads_image = $ads_image;
            }


            $epaper_ads->save();

        return back()->with('category_success', 'Added Successfully !');
    }

    public function view_epaper_ads()
    {
        $e_paper_pages = EpaperPage::orderBy('id', 'desc')->get();

        return view('backend.pages.e_paper.manage_epaper_ads', compact('e_paper_pages'));
    }

    public function view()
    {
        $e_paper_pages = EpaperPage::orderBy('id', 'desc')->get();

        return view('backend.pages.e_paper.manage', compact('e_paper_pages'));
    }

    public function view_column()
    {
        $e_paper_pages = EpaperColumn::orderBy('date', 'desc')->get();
        // dd($e_paper_pages);

        return view('backend.pages.e_paper.manage_column', compact('e_paper_pages'));
    }

    public function edit($id)
    {
        $page_info = EpaperPage::find($id);
        $page_data['date'] = $page_info->date;
        $e_paper_pages = EpaperPage::where('date', $page_info->date)->get();
        foreach ($e_paper_pages as $page) {
            if ($page->page_number == 1) {
                $page_data['one'] = $page;
            }
            if ($page->page_number == 2) {
                $page_data['two'] = $page;
            }
            if ($page->page_number == 3) {
                $page_data['three'] = $page;
            }
            if ($page->page_number == 4) {
                $page_data['four'] = $page;
            }
            if ($page->page_number == 5) {
                $page_data['five'] = $page;
            }
            if ($page->page_number == 6) {
                $page_data['six'] = $page;
            }
            if ($page->page_number == 7) {
                $page_data['seven'] = $page;
            }
            if ($page->page_number == 8) {
                $page_data['eight'] = $page;
            }
        }


        return view('backend.pages.e_paper.edit', $page_data);


    }

    public function map_column($id)
    {
        $page_info = EpaperColumn::find($id);
        // dd($page_info);

        return view('backend.pages.e_paper.map_column', compact('page_info'));


    }


    public function update_map(Request $request, $id)
    {
            $epaper_column_update = EpaperColumn::findOrFail($id);
            // dd($epaper_column_update);
            
            $epaper_column_update->map_date = $request->map_date;
            $epaper_column_update->map_page_number = $request->map_page_number;
            $epaper_column_update->map_column_number = $request->map_column_number;
            

            if ($request->file('map_image')) {
                $manager = new ImageManager(new Driver());
                $filenamewithextension = $request->file('map_image')->getClientOriginalName();
        
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
                //get file extension
                $extension = $request->file('map_image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                $img = $manager->read($request->file('map_image'));
    
    
                $img = $img->crop(
                    $request->input('width2'),  // Width
                    $request->input('height2'), // Height
                    $request->input('left2'),   // X-coordinate (left)
                    $request->input('top2')     // Y-coordinate (top)
                );


                $image =  $img->resize($request->width2 +30 , $request->height2, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
    
                $image->toPng()->save('backend/images/e-paper-page/'.$filenametostore);

                $epaper_column_update->map_image = $filenametostore;
            }

            $epaper_column_update->update();
        return back()->with('category_success', 'Added Successfully !');
    }

    public function update(Request $request)
    {

        if ($request->page_number1 && $request->page_image1) {
            $page = EpaperPage::where('page_number',$request->page_number1)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number1;

            if(!empty($request->page_image1)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image1)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image1);
                }
                if ($request->page_image1) {
                    $titleImage = $request->file('page_image1');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }
        if ($request->page_number2 && $request->page_image2) {
            $page = EpaperPage::where('page_number',$request->page_number2)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number2;
            if(!empty($request->page_image2)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image2)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image2);
                }
                if ($request->page_image2) {
                    $titleImage = $request->file('page_image2');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }
        if ($request->page_number3 && $request->page_image3) {
            $page = EpaperPage::where('page_number',$request->page_number3)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number3;
            if(!empty($request->page_image3)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image3)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image3);
                }
                if ($request->page_image3) {
                    $titleImage = $request->file('page_image3');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }
        if ($request->page_number4 && $request->page_image4) {
            $page = EpaperPage::where('page_number',$request->page_number4)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number4;
            if(!empty($request->page_image4)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image4)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image4);
                }
                if ($request->page_image4) {
                    $titleImage = $request->file('page_image4');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }

        if ($request->page_number5 && $request->page_image5) {
            $page = EpaperPage::where('page_number',$request->page_number5)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number5;
            if(!empty($request->page_image5)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image5)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image5);
                }
                if ($request->page_image5) {
                    $titleImage = $request->file('page_image5');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }

        if ($request->page_number6 && $request->page_image6) {
            $page = EpaperPage::where('page_number',$request->page_number6)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number6;
            if(!empty($request->page_image6)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image6)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image6);
                }
                if ($request->page_image6) {
                    $titleImage = $request->file('page_image6');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }

        if ($request->page_number7 && $request->page_image7) {
            $page = EpaperPage::where('page_number',$request->page_number7)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number7;
            if(!empty($request->page_image7)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image7)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image7);
                }
                if ($request->page_image7) {
                    $titleImage = $request->file('page_image7');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }

        if ($request->page_number8 && $request->page_image8) {
            $page = EpaperPage::where('page_number',$request->page_number8)->where('date',$request->date)->first();
            if (!isset($page)){
                $page = new EpaperPage();
            }
            $page->date = $request->date;
            $page->page_number = $request->page_number8;
            if(!empty($request->page_image8)){
                if(File::exists('backend/images/e-paper-page/' .$page->page_image8)){
                    File::delete('backend/images/e-paper-page/' .$page->page_image8);
                }
                if ($request->page_image8) {
                    $titleImage = $request->file('page_image8');
                    $customTitleImage = rand() . '.' . $titleImage->getClientOriginalExtension();
                    $titleImagePath = public_path('backend/images/e-paper-page/' . $customTitleImage);
                    Image::make($titleImage)->save($titleImagePath);
                    $page->page_image = $customTitleImage;
                }
            }
            $page->save();
        }
        return redirect()->route('manage_e_paper')->with('update_news_success','Updated Successfully !');

    }

    public function delete($id)
    {
        $e_paper_page = EpaperPage::find($id);

        if ($e_paper_page) {
            if (File::exists('backend/images/e-paper-page/' . $e_paper_page->page_image)) {
                File::delete('backend/images/e-paper-page/' . $e_paper_page->page_image);
            }
        }
        $e_paper_page->delete();
        return redirect()->back()->with('delete_news_success', 'Delete Successfully !');
    }

    public function delete_e_paper_column($id)
    {
        $e_paper_column = EpaperColumn::find($id);

        if ($e_paper_column) {
            if (File::exists('backend/images/e-paper-page/' . $e_paper_column->column_image)) {
                File::delete('backend/images/e-paper-page/' . $e_paper_column->column_image);
            }
        }
        $e_paper_column->delete();
        return redirect()->back()->with('delete_news_success', 'Delete Successfully !');
    }
}
