<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Tender;
use App\Models\MilkPurchasePriceChart;

class FrontTenderController extends Controller
{
    public function index(Request $request){
        $page = Page::where(['id'=>18])->first();
        $query = Tender::where('status', 'active');
        if($request->has('search') && $request->search != ''){
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $tenders = $query->orderBy('publish_date', 'desc')->paginate(10);
        return view('frontend/tenders')->with(['page'=>$page, 'tenders'=>$tenders]);
    }

    public function milkPurchasePriceChart(Request $request){
        $page = Page::where(['id'=>19])->first();
        $query = MilkPurchasePriceChart::where('status', 'active');
        if($request->has('search') && $request->search != ''){
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $tenders = $query->orderBy('publish_date', 'desc')->paginate(10);
        return view('frontend/milk_purchase_chart')->with(['page'=>$page, 'tenders'=>$tenders]);
    }
}
