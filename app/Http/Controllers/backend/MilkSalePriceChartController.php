<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MilkSalePriceChart;
use Session;
use File;

class MilkSalePriceChartController extends Controller
{
    public function listMilkSalePriceCharts(){
        $data = MilkSalePriceChart::orderBy('created_at', 'desc')->get();
        return view('backend/milk_sale_price_charts/list_milk_sale_price_charts')->with(['data' => $data]);
    }

    public function addMilkSalePriceChart(){
        return view('backend/milk_sale_price_charts/add_milk_sale_price_chart');
    }

    public function storeMilkSalePriceChart(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'publish_date' => 'required|date_format:d-m-Y',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/milk_sale_price_charts'), $filename);
            $filePath = $filename;
        }

        MilkSalePriceChart::create([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        Session::flash('success', 'Milk Sale Price Chart added successfully!');
        return redirect()->route('admin.list.milk_sale_price_charts');
    }

    public function editMilkSalePriceChart($id){
        $data = MilkSalePriceChart::findOrFail($id);
        return view('backend/milk_sale_price_charts/edit_milk_sale_price_chart', compact('data'));
    }

    public function updateMilkSalePriceChart(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'publish_date' => 'required|date_format:d-m-Y',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $chart = MilkSalePriceChart::findOrFail($id);

        $filePath = $chart->file;
        if ($request->hasFile('file')) {
            // Delete old file
            if ($filePath && File::exists(public_path('uploads/milk_sale_price_charts/' . $filePath))) {
                File::delete(public_path('uploads/milk_sale_price_charts/' . $filePath));
            }
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/milk_sale_price_charts'), $filename);
            $filePath = $filename;
        }

        $chart->update([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        Session::flash('success', 'Milk Sale Price Chart updated successfully!');
        return redirect()->route('admin.list.milk_sale_price_charts');
    }

    public function deleteMilkSalePriceChart($id){
        $chart = MilkSalePriceChart::findOrFail($id);

        // Delete file
        if ($chart->file && File::exists(public_path('uploads/milk_sale_price_charts/' . $chart->file))) {
            File::delete(public_path('uploads/milk_sale_price_charts/' . $chart->file));
        }

        $chart->delete();

        Session::flash('success', 'Milk Sale Price Chart deleted successfully!');
        return redirect()->route('admin.list.milk_sale_price_charts');
    }
}