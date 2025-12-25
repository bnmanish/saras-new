<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaPress;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class MediaPressController extends Controller
{
    public function index(Request $request){
        $page = Page::where(['id'=>4])->first(); // You may need to create this page in admin or adjust the ID
        $query = MediaPress::query();
        
        if($request->has('search') && $request->search != ''){
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('short_description', 'like', '%'.$request->search.'%');
            });
        }
        
        $mediaPress = $query->orderBy('date', 'desc')->paginate(10);
        
        // Check if files exist for each media press item
        foreach($mediaPress as $item) {
            // Check if image exists
            if($item->image) {
                $imagePath = public_path('uploads/media_press/'.$item->image);
                $item->image_exists = File::exists($imagePath);
            } else {
                $item->image_exists = false;
            }
            
            // Check if PDF exists (only for local files, not external links)
            if($item->pdf_or_link) {
                if(strpos($item->pdf_or_link, 'http') === 0) {
                    // For external links, check if URL is accessible
                    $item->pdf_exists = $this->checkUrlExists($item->pdf_or_link);
                } else {
                    // For local PDF files
                    $pdfPath = public_path('uploads/media_press/'.$item->pdf_or_link);
                    $item->pdf_exists = File::exists($pdfPath);
                }
            } else {
                $item->pdf_exists = false;
            }
        }
        
        return view('frontend/media_press')->with(['page'=>$page, 'mediaPress'=>$mediaPress]);
    }
    
    private function checkUrlExists($url) {
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            // Return true if HTTP code is 2xx or 3xx, false otherwise
            return ($httpCode >= 200 && $httpCode < 400) && empty($error);
        } catch (\Exception $e) {
            return false;
        }
    }
}

