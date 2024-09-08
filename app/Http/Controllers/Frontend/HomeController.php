<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\EpaperPage;
use App\Models\Backend\EpaperColumn;
use App\Models\Backend\NewsAds;
use App\Models\Backend\EpaperAds;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Backend\PostNews;
use App\Models\Backend\Category;
use App\Models\Backend\Multimedia;
use App\Models\Backend\Author;


class HomeController extends Controller{

    public function index(Request $request){

		$lead_news = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->first();
		$second_lead = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->skip(1)->take(4)->get();
		$latest = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->take(5)->get();


		$national = PostNews::where('news_status', 1)->where('category_slug', 'national')->orderBy('news_id', 'desc')->take(6)->get();

		$selected = PostNews::where('news_status', 1)->where('elected_status', 1)->orderBy('news_id', 'desc')->take(3)->get();
		$selected_2 = PostNews::where('news_status', 1)->where('elected_status', 1)->orderBy('news_id', 'desc')->skip(3)->take(5)->get();

		$editorial_1 = PostNews::where('news_status', 1)->where('category_slug', 'editorial')->orderBy('news_id', 'desc')->first();
		$editorial_2 = PostNews::where('news_status', 1)->where('category_slug', 'editorial')->orderBy('news_id', 'desc')->skip(1)->take(2)->get();

		$tott_1 = PostNews::where('news_status',1)->where('tot_status',1)->orderBy('news_id', 'desc')->first();
		$tott_2 = PostNews::where('news_status',1)->where('tot_status',1)->orderBy('news_id', 'desc')->skip(1)->take(3)->get();

		$politics_1 = PostNews::where('news_status', 1)->where('category_slug', 'politics')->orderBy('news_id', 'desc')->first();
		$politics_2 = PostNews::where('news_status', 1)->where('category_slug', 'politics')->orderBy('news_id', 'desc')->skip(1)->take(3)->get();

		$law_1 = PostNews::where('news_status', 1)->where('category_slug', 'court-and-law')->orderBy('news_id', 'desc')->first();
		$law_2 = PostNews::where('news_status', 1)->where('category_slug', 'court-and-law')->orderBy('news_id', 'desc')->skip(1)->take(3)->get();

		$total_country = PostNews::where('news_status', 1)->where('category_slug', 'total-country')->orderBy('news_id', 'desc')->take(3)->get();

		$ban_abroad = PostNews::where('news_status', 1)->where('category_slug', 'bengali-immigration')->orderBy('news_id', 'desc')->take(6)->get();

		$sports_1 = PostNews::where('news_status', 1)->where('category_slug', 'sports')->orderBy('news_id', 'desc')->first();
		$sports_2 = PostNews::where('news_status', 1)->where('category_slug', 'sports')->orderBy('news_id', 'desc')->skip(1)->take(6)->get();

		$international_1 = PostNews::where('news_status', 1)->where('category_slug', 'international')->orderBy('news_id', 'desc')->first();
		$international_3 = PostNews::where('news_status', 1)->where('category_slug', 'international')->orderBy('news_id', 'desc')->skip(1)->take(6)->get();
		$international_2 = PostNews::where('news_status', 1)->where('category_slug', 'international')->orderBy('news_id', 'desc')->skip(7)->take(2)->get();

		$sevenDaysAgo = Carbon::now()->subDays(7);
		$most_reased = PostNews::where('news_status', 1)
			->orderBy('news_id', 'desc')
			->where('created_at', '>=', $sevenDaysAgo)
			->orderBy('nofn_readers', 'desc')
			->take(5)
			->get()
		;

		if ($request->date){
            $e_paper_pages = EpaperPage::orderBy('page_number', 'ASC')
                ->where('date', $request->date)
                ->get();
            $date = $request->date;
        }
		else{
            $e_paper_pages = EpaperPage::orderBy('page_number', 'ASC')
                ->where('date', date('Y-m-d'))
                ->get();
            $date = date('Y-m-d');
        }


		$economics_1 = PostNews::where('news_status', 1)->where('category_slug', 'finance-and-rade')->orderBy('news_id', 'desc')->take(3)->get();
		$economics_2 = PostNews::where('news_status', 1)->where('category_slug', 'finance-and-rade')->orderBy('news_id', 'desc')->skip(3)->take(6)->get();

		$technology_1 = PostNews::where('news_status', 1)->where('category_slug', 'technology')->orderBy('news_id', 'desc')->first();
		$technology_2 = PostNews::where('news_status', 1)->where('category_slug', 'technology')->orderBy('news_id', 'desc')->skip(1)->take(3)->get();

		$education_1 = PostNews::where('news_status', 1)->where('category_slug', 'education')->orderBy('news_id', 'desc')->first();
		$education_2 = PostNews::where('news_status', 1)->where('category_slug', 'education')->orderBy('news_id', 'desc')->skip(1)->take(3)->get();
		$banner_show = NewsAds::where('status', 'A')->first();
		// dd($banner_show);

		// $tlk_twn_slider_992 = PostNews::where('news_status','true')->where('tot_status','true')->orderBy('news_id', 'desc')->take(4)->get();
		// $tlk_twn_slider_768 = PostNews::where('news_status','true')->where('tot_status','true')->orderBy('news_id', 'desc')->take(4)->get();
		// $tlk_twn_slider_576 = PostNews::where('news_status','true')->where('tot_status','true')->orderBy('news_id', 'desc')->take(4)->get();
		// $tlk_twn_slider_575 = PostNews::where('news_status','true')->where('tot_status','true')->orderBy('news_id', 'desc')->take(4)->get();




        return view('frontend.pages.home',
			compact(
				'lead_news',
				'second_lead',
				'latest',
				'national',
				'selected',
				'selected_2',
				'editorial_1',
				'editorial_2',
				'tott_1',
				'tott_2',
				'politics_1',
				'politics_2',
				'law_1',
				'law_2',
				'total_country',
				'ban_abroad',
				'sports_1',
				'sports_2',
				'international_1',
				'international_2',
				'international_3',
				'most_reased',
				'economics_1',
				'economics_2',
				'technology_1',
				'technology_2',
				'education_1',
				'education_2',
                'e_paper_pages',
                'date',
				'banner_show'
			)
		);
    }


	public function Search(Request $request){
		$categories = Category::all();
        $searches = PostNews::where('news_status', 'true')
			->orderBy('news_id', 'DESC')
			// ->where('EndDate', '>=', $todaty)
			->where('news_headline', 'LIKE', '%' . $request->search . '%')
		->get();

		$breakingNews = PostNews::all();
		return view('frontend.pages.search', compact('searches', 'categories', 'breakingNews'));
    }

	public function newsCategory($category_slug){

		$cat_wise_news = PostNews::where('news_status', 1)
		->where('category_slug', $category_slug)
		->orderBy('news_id', 'desc')
		->get();

		$category_name = Category::where('category_status', 1)
		->where('category_slug', $category_slug)
		->first();

		$banner_show = NewsAds::where('status', 'A')->first();


		return view('frontend.pages.category_news', compact('cat_wise_news', 'category_name','banner_show'));
	}


	public function newsDetails($slug){
		$categories = Category::all();
		// $breakingNews = PostNews::whereDate('created_at', '>', now()->subDay())->get();
		// $breakingNews = PostNews::orderBy('news_id', 'desc')
		// 	->take(4)
		// 	->get()
		// ;
		$category_news = PostNews::all();

		$singleNews = PostNews::where('slug', $slug)->first();
		$banner_show = NewsAds::where('status', 'A')->first();
		
		// $singleNews->increment('nofn_readers');

		//Latest News
		$latestNews = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->skip(1)->take(6)->get();
		return view('frontend.pages.news-details',
			compact(
				'categories',
				// 'breakingNews',
				'category_news',
				'singleNews',
				'latestNews',
				'banner_show'
			)
		);
	}

//    public function e_paper_page(Request $request)
//    {
//        return $request;
//        $e_paper_page = EpaperPage::find($id);
//        return view('frontend.pages.e_paper_page',compact('e_paper_page'));
//
//
//    }

	public function latest_news(){
		$latestNews = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->skip(1)->paginate();

		return view('frontend.pages.latestnews',compact('latestNews'));
	}


	public function epaper(Request $request){
		
		// $latestNews = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->skip(1)->paginate(16);
		if(!empty($request->date)){
			$today = $request->date;
		}else{
			// $today = Carbon::today()->toDateString();
			$today = EpaperPage::where('page_number', 1)
            ->orderBy('date', 'desc')
            ->first()
            ->date;

			// dd($today);
		}

			// $today = Carbon::today()->toDateString(); // Get today's date

			$e_paper = EpaperPage::whereDate('date', $today)
			->get();

			$e_paper_column = EpaperColumn::where('page_number','1')->whereDate('date', $today)->get();

			$e_paper1 = EpaperPage::where('page_number', 1)
							  ->whereDate('date', $today)
							  ->get();

			 $e_paper_ads = EpaperAds::orderBy('priority', 'asc')->get();
		//    dd($e_paper);

		if (isset($e_paper[0]) && isset($e_paper1[0])) {
			return view('frontend.pages.epaper', compact('e_paper', 'e_paper1', 'e_paper_ads', 'e_paper_column'));
		} else {
			return view('frontend.pages.404');
		}
		// return view('frontend.pages.epaper',compact('e_paper','e_paper1','e_paper_ads','e_paper_column'));
	}

	public function page(Request $request, $date,$page_number){
		if(!empty($request->date)){
			$date = $request->date;
		}
		// $latestNews = PostNews::where('news_status', 1)->orderBy('news_id', 'desc')->skip(1)->paginate(16);
		// $page = EpaperPage::where('date',$date )->where('page_number',$page_number )->first();
		$page = EpaperPage::where('date',$date )->where('page_number',$page_number)->first();
		$e_paper_column = EpaperColumn::where('date',$date )->where('page_number',$page_number )->get();
		// $e_paper = EpaperPage::all();
		$e_paper = EpaperPage::where('date',$date )->get();
		$e_paper_ads = $e_paper_ads = EpaperAds::orderBy('priority', 'asc')->get();
		// dd($today);
		// return view('frontend.pages.latestnews',compact('latestNews'));
		return view('frontend.pages.page',compact('e_paper','page','e_paper_column','e_paper_ads'));
	}

	public function column_view($date,$page_number,$column_number){
		$column_news = EpaperColumn::where('date', $date)
		->where('page_number', $page_number)->where('column_number', $column_number)
		->first();
		
		
		// return view('frontend.pages.latestnews',compact('latestNews'));
		return view('frontend.pages.column_view',compact('column_news'));
	}

	public function column_view_add($date,$page_number,$column_number){
		$column_news = EpaperColumn::where('map_date', $date)
		->where('map_page_number', $page_number)->where('map_column_number', $column_number)
		->first();
		
		// dd($column_news);
		
		// return view('frontend.pages.latestnews',compact('latestNews'));
		return view('frontend.pages.column_view_add',compact('column_news'));
	}


	public function column_share($date,$page_number,$column_number){
		$column_news = EpaperColumn::where('date', $date)
		->where('page_number', $page_number)->where('column_number', $column_number)
		->first();
		
		// dd($column_news);
		
		// return view('frontend.pages.latestnews',compact('latestNews'));
		return view('frontend.pages.column_share',compact('column_news'));
	}

	

    public function get_e_paper_page()
    {
        $pages = EpaperPage::where('date',$_GET['date'])->get();
        return view('frontend.pages.components.e_paper_ajax',compact('pages'));;
	}
}
