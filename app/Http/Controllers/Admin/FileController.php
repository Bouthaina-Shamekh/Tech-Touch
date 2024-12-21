<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index()
    {
        $this->authorize('view', File::class);
        $files = File::Orderby('id','desc')->get();
        return view('dashboard.file.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', File::class);
        $files = File::first();
        $images = Media::paginate(100);
        return view('dashboard.file.create',compact('files','images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', File::class);
        $request->validate([
            'file_name_en'=> 'required',
            'file_name_ar'=> 'required',
            'file' =>'required|file|mimes:pdf,pptx,xlsx,docx',
            'description_en' => 'required',
            'description_ar' => 'required',
            'price' => 'required',
            'btn' => 'nullable',

        ]);

        $file_name = rand().time().$request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('files'), $file_name);

        // Insert To Database
        File::create([
            'file_name_en' => $request->file_name_en,
            'file_name_ar' => $request->file_name_ar,
            'file' => $file_name,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'price' =>$request->price,
            'btn' =>$request->btn,
            'image' => $request->imagePath,
        ]);

        // dd($request->all());

        return redirect()->route('admin.file.index')->with('success', __('Item updated successfully.'));
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
        $this->authorize('edit', File::class);
        $files = File::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.file.edit',compact('files','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $this->authorize('edit', File::class);
    $request->validate([
        'file_name_en' => 'required',
        'file_name_ar' => 'required',
        'file' => 'nullable|file|mimes:pdf,pptx,xlsx,docx',
        'description_en' => 'required',
        'description_ar' => 'required',
        'price' => 'required',
        'btn' => 'nullable',
    ]);

    // استرجاع السجل من قاعدة البيانات
    $files = File::findOrFail($id);

    // إذا تم رفع ملف جديد
    if ($request->hasFile('file')) {
        // حذف الملف القديم إذا كان موجودًا
        $oldFilePath = public_path('files/' . $files->file);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);  // حذف الملف القديم
        }

        // إنشاء اسم فريد للملف الجديد
        $file_name = rand() . time() . $request->file('file')->getClientOriginalName();

        // تخزين الملف الجديد في المجلد
        $request->file('file')->move(public_path('files'), $file_name);
    } else {
        // إذا لم يتم رفع ملف جديد، الاحتفاظ بالملف القديم
        $file_name = $files->file;
    }

    $images = $files->image;
    if($request->imagePath == null){
        $images  = $request->imagePath;
    }
    // تحديث السجل في قاعدة البيانات
    $files->update([
        'file_name_en' => $request->file_name_en,
        'file_name_ar' => $request->file_name_ar,
        'file' => $file_name,
        'description_ar' => $request->description_ar,
        'description_en' => $request->description_en,
        'price' => $request->price,
        'btn' => $request->btn,
        'image' => $request->imagePath,

    ]);

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('admin.file.index')->with('success', __('Item updated successfully.'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', File::class);
        $files = File::findOrFail($id);
        $files->delete();
        return redirect()->route('admin.file.index')->with('success', __('Item deleted successfully.'));
    }
}
