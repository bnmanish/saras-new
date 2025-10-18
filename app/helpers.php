<?php

use App\Models\Setting;
use App\Models\AdditionalPage;
use App\Models\City;
use App\Models\Brand;

function getSetting(){
	return Setting::first();
}

function citiesList(){
	return City::select('title','url')->where(['status'=>'1'])->orderBy('sequence','asc')->get();
}

function brandList(){
	return Brand::select('title','url')->where(['status'=>'1'])->orderBy('sequence','asc')->get();
}

function additionalPage(){
	return AdditionalPage::where('status','1')->get();
}