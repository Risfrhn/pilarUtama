<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landingModel as ModalData;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function showLandingPageAdmin()
    {
        $modalData = ModalData::all(); 
        return view('Admin.Landing.landingPageAdmin', compact('modalData'));
    }


    public function update(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'imageflyer' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240', // max 10MB
                'gambarAboutUs' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'architecturImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'interiorImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'landscapeImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'renovationImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'comercialBuildImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'desk1' => 'nullable|string|max:10000',
                'desk2' => 'nullable|string|max:10000',
                'architectur_desk' => 'nullable|string|max:10000',
                'interior_desk' => 'nullable|string|max:10000',
                'landscape_desk' => 'nullable|string|max:10000',
                'renovation_desk' => 'nullable|string|max:10000',
                'comercial_build_desk' => 'nullable|string|max:10000',
            ]);
        
            // Ambil data pertama yang ada (ID 1)
            $modalData = ModalData::find(1);
        
            if (!$modalData) {
                return redirect()->route('dashboardAdmin.view')->with('error', 'Data tidak ditemukan!');
            }
        
            // Fungsi untuk menyimpan gambar hanya jika ada file baru dan ukurannya valid
            $saveImage = function ($fieldName, $dbField) use ($request, $modalData) {
                if ($request->hasFile($fieldName)) {
                    $file = $request->file($fieldName);
                    // Cek jika ukuran file lebih dari 10MB
                    if ($file->getSize() > 10 * 1024 * 1024) {
                        return redirect()->route('dashboardAdmin.view')->with('error', 'Ukuran file gambar ' . $fieldName . ' melebihi batas 10MB!');
                    }

                    // Hapus gambar lama jika ada
                    if (!empty($modalData->$dbField) && file_exists(public_path($modalData->$dbField))) {
                        unlink(public_path($modalData->$dbField));
                    }
        
                    // Simpan gambar baru
                    $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('images/landing'), $fileName);
                    $modalData->$dbField = 'images/landing/' . $fileName;
                }
            };
        
            // Update hanya jika ada gambar baru
            $saveImage('imageflyer', 'flyer_image');
            $saveImage('gambarAboutUs', 'about_us_image');
            $saveImage('architecturImage', 'architectur_image');
            $saveImage('interiorImage', 'interior_image');
            $saveImage('landscapeImage', 'landscape_image');
            $saveImage('renovationImage', 'renovation_image');
            $saveImage('comercialBuildImage', 'comercial_build_image');
        
            // Update hanya jika ada teks baru
            if ($request->filled('desk1')) $modalData->about_us_desk1 = $request->desk1;
            if ($request->filled('desk2')) $modalData->about_us_desk2 = $request->desk2;
            if ($request->filled('architectur_desk')) $modalData->architectur_desk = $request->architectur_desk;
            if ($request->filled('interior_desk')) $modalData->interior_desk = $request->interior_desk;
            if ($request->filled('landscape_desk')) $modalData->landscape_desk = $request->landscape_desk;
            if ($request->filled('renovation_desk')) $modalData->renovation_desk = $request->renovation_desk;
            if ($request->filled('comercial_build_desk')) $modalData->comercial_build_desk = $request->comercial_build_desk;
        
            // Simpan perubahan
            if ($modalData->isDirty() && $modalData->save()) {
                return redirect()->route('dashboardAdmin.view')->with('success', 'Data berhasil diperbarui!');
            }
        
            return redirect()->route('dashboardAdmin.view')->with('info', 'Tidak ada perubahan yang dilakukan.');
        
        } catch (\Exception $e) {
            return redirect()->route('dashboardAdmin.view')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



}
