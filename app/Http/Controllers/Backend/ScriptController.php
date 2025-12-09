<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Script;
use Illuminate\Support\Facades\Session;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Script::with('page')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.scripts.index', compact('scripts'));
    }
    
    public function create()
    {
        return view('backend.scripts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean'
        ]);
        
        $script = Script::create($request->all());
        
        Session::flash('success', 'Script created successfully!');
        
        return redirect()->route('scripts.index');
    }
    
    public function edit($id)
    {
        $script = Script::findOrFail($id);
        return view('backend.scripts.edit', compact('script'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean'
        ]);
        
        $script = Script::findOrFail($id);
        $script->update($request->all());
        
        Session::flash('success', 'Script updated successfully!');
        
        return redirect()->route('scripts.index');
    }
    
    public function destroy($id)
    {
        $script = Script::findOrFail($id);
        $script->delete();
        
        Session::flash('success', 'Script deleted successfully!');
        
        return redirect()->route('scripts.index');
    }
}