<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', Partner::class);
        $partners = Partner::Orderby('id','desc')->get();
        $images = Media::paginate(100);

        return view('dashboard.partners.index',compact('partners','images'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Partner::class);
        $request->validate([
            'link' => 'nullable|string|url',
            'imagePath' => 'required|string',
        ]);
        Partner::create([
            'link' => $request->link,
            'image' => $request->imagePath,
        ]);
        return redirect()->route('admin.partner.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $this->authorize('edit', Partner::class);
        $request->validate([
            'link' => 'nullable|string|url',
            'imagePath' => 'nullable|string',
        ]);

        $image  = $request->imagePath;
        if($image == null){
            $image = $partner->image;
        }

        $partner->update([
            'link' => $request->link,
            'image' => $image,
        ]);
        return redirect()->route('admin.partner.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Partner::class);
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->route('admin.partner.index')->with('success', __('Item deleted successfully.'));
    }
}
