<?php

namespace App\Http\Controllers\Admin;

use App\Models\Work;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cat_Work;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with('categories')->orderBy('id', 'desc')->get();
        return view('dashboard.work.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $works = Work::first();
        $images = Media::paginate(100);
        $categories = Cat_Work::get();
        return view('dashboard.work.create',compact('works','images','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'imagePath' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'link' => 'nullable|url',
            'categories' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $request->merge(['image' => $request->imagePath]);
            // Insert To Database
            $work = Work::create($request->all());

            $categories = explode(',', $request->categories);
            foreach ($categories as $category) {
                Cat_Work::create([
                    'work_id' => $work->id,
                    'name_en' => $category,
                    'name_ar' => $category,
                ]);
            }
            DB::commit();
            return redirect()->route('admin.work.index')->with('success', __('Item updated successfully.'));
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('danger', $e->getMessage());
        }
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
        $works = Work::findOrFail($id);
        $images = Media::paginate(100);
        $categories = Cat_Work::get();
        $works->categories = implode(',', $works->categories->pluck('name_en')->toArray());
        return view('dashboard.work.edit',compact('works','images','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'imagePath' => 'nullable',
            'description_en' => 'required',
            'description_ar' => 'required',
            'link' => 'nullable|url',
            'categories' => 'nullable|string',
        ]);
        DB::beginTransaction();
        try {
            $work = Work::findOrFail($id);
            $image = $request->imagePath;
            if($image == null){
                $image = $work->image;
            }

            $request->merge(['image' => $image]);

            // Insert To Database
            $work->update($request->all());

            $work->categories()->delete();
            $categories = explode(',', $request->categories);
            foreach ($categories as $category) {
                Cat_Work::create([
                    'work_id' => $work->id,
                    'name_en' => $category,
                    'name_ar' => $category,
                ]);
            }
            DB::commit();
            return redirect()->route('admin.work.index')->with('success', __('Item updated successfully.'));
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $works = Work::findOrFail($id);
        $works->delete();
        return redirect()->route('admin.work.index')->with('success', __('Item deleted successfully.'));
    }
}
