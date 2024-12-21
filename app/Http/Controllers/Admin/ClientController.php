<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $this->authorize('view', Client::class);
        $clients = Client::Orderby('id','desc')->get();
        return view('dashboard.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Client::class);
        $clients = Client::first();
        $images = Media::paginate(100);
        return view('dashboard.client.create',compact('clients','images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Client::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'imagePath' => 'required',
            'job' => 'required',
            'feedback_en' => 'nullable',
            'feedback_ar' => 'nullable',
            'stars' => 'nullable|numeric',


        ]);
        // Insert To Database
        Client::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'job' => $request->job,
            'feedback_en' => $request->feedback_en,
            'feedback_ar' => $request->feedback_ar,
            'image' => $request->imagePath,
            'stars' => $request->stars,
        ]);

        return redirect()->route('admin.client.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', Client::class);
        $clients = Client::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.client.edit',compact('clients','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Client::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'job' => 'required',
            'imagePath' => 'nullable',
            'feedback_en' => 'nullable',
            'feedback_ar' => 'nullable',
            'stars' => 'nullable|numeric',

        ]);

        $clients = Client::findOrFail($id);
        $image = $request->imagePath;
        if($image == null){
            $image = $clients->image;
        }

        // Insert To Database
        $clients->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'job' => $request->job,
            'feedback_en' => $request->feedback_en,
            'feedback_ar' => $request->feedback_ar,
            'image' => $image ,
            'stars' => $request->stars,
        ]);

        return redirect()->route('admin.client.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Client::class);
        $clients = Client::findOrFail($id);
        $clients->delete();
        return redirect()->route('admin.client.index')->with('success', __('Item deleted successfully.'));
    }

}
