<?php

namespace App\Http\Controllers;

use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Models\CondominiumImage;

class CondominiumImageController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $images = CondominiumImage::paginate();
        return view('condominium_images.index', compact('images'));
    }
    
    public function create()
    {
        return view('condominium_images.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'condominium_id' => 'required|exists:condominiums,id',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $this->imageUpload($request->file('image'), 'condominium_images');
            CondominiumImage::create([
                'condominium_id' => $request->input('condominium_id'),
                'image_path' => $imagePath,
            ]);
        }
    }
    
    public function show(string $id)
    {
        $image = CondominiumImage::findOrFail($id);
        return view('condominium_images.show', compact('image'));
    }
   
    public function edit(string $id)
    {
        $image = CondominiumImage::findOrFail($id);
        return view('condominium_images.edit', compact('image'));
    }

    public function update(Request $request, string $id)
    {
        $image = CondominiumImage::findOrFail($id);

        $request->validate([
            'condominium_id' => 'required|exists:condominiums,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = ['condominium_id' => $request->input('condominium_id')];

        if ($request->hasFile('image')) {
            $imagePath = $this->imageUpload($request->file('image'), 'condominium_images');
            $data['image_path'] = $imagePath;
        }

        $image->update($data);
        return redirect()->route('condominium_images.index')->with('success', 'Imagem atualizada com sucesso.');
    }
   
    public function destroy(string $id)
    {
        $image = CondominiumImage::findOrFail($id);
        $image->delete();
        return redirect()->route('condominium_images.index')->with('success', 'Imagem deletada com sucesso.');
    }
}
