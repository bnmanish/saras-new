<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Tender;
use App\Models\MilkPurchasePriceChart;
use App\Models\MilkSalePriceChart;
use App\Models\Beneficiary;
use App\Models\QualityAssurance;

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

    public function milkSalePriceChart(Request $request){
        $page = Page::where(['id'=>20])->first();
        $query = MilkSalePriceChart::where('status', 'active');
        if($request->has('search') && $request->search != ''){
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $tenders = $query->orderBy('publish_date', 'desc')->paginate(10);
        return view('frontend/milk_sale_chart')->with(['page'=>$page, 'tenders'=>$tenders]);
    }

    public function beneficiaries(Request $request){
        $page = Page::where(['id'=>21])->first();
        $query = Beneficiary::where('status', 'active');
        if($request->has('search') && $request->search != ''){
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $tenders = $query->orderBy('publish_date', 'desc')->paginate(10);
        return view('frontend/beneficiaries')->with(['page'=>$page, 'tenders'=>$tenders]);
    }

    public function qualityAssurance(Request $request){
        $page = Page::where(['id'=>23])->first();
        $query = QualityAssurance::where('status', 'active');
        if($request->has('search') && $request->search != ''){
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $qualityAssurances = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend/quality_assurance')->with(['page'=>$page, 'qualityAssurances'=>$qualityAssurances]);
    }
}
