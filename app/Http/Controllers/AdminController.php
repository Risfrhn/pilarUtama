<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landingModel as ModalData;
use App\Models\projectModel as Project;
use App\Models\projectBefore as ProjectBefore;
use App\Models\projectAfter as ProjectAfter;
use App\Models\projectVideo as ProjectVideo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminController extends Controller
{

    #LANDING PAGE
    public function showLandingPageAdmin()
    {
        $modalData = ModalData::all(); 
        // Mengambil proyek berdasarkan status
        $finishedProjects = Project::where('status', 'finished')->count();
        $ongoingProjects = Project::where('status', 'ongoing')->count();
        $designProjects = Project::where('status', 'beingDesign')->count();
        $negotiationProjects = Project::where('status', 'negotiation')->count();

        return view('Admin.Landing.landingPageAdmin', compact(
            'modalData',
            'finishedProjects',
            'ongoingProjects',
            'designProjects',
            'negotiationProjects'));
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





    #PROJEK
    ##List projek
    public function showProject($status)
    {
        $projects = Project::where('status', $status)->get();
        

        return view('Admin.List.listProjek', compact(
            'projects',
            'status',
        ));
    }

    ###List projek Nego
    public function showProjectNego($status)
    {
        $projects = Project::where('status', $status)->get();

        return view('Admin.List.listProjekNegoAdmin', compact('projects','status'));
    }



    ##Tambah projek
    public function storeProject(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'nullable|string|max:255',
                'description1' => 'nullable|string|max:10000',
                'description2' => 'nullable|string|max:10000',
                'jenis_projek' => 'nullable|string|max:255',
                'target_pengerjaan_start' => 'nullable|date',
                'target_pengerjaan_end' => 'nullable|date|after_or_equal:target_pengerjaan_start',
                'status' => 'nullable|string|max:50',
                'gambarflyer' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240', // max 10MB
            ]);
    
            // Membuat data proyek baru
            $project = new Project();
            $project->name = $request->name;
            $project->description1 = $request->description1;
            $project->description2 = $request->description2;
            $project->jenis_projek = $request->jenis_projek;
            $project->target_pengerjaan_start = $request->target_pengerjaan_start;
            $project->target_pengerjaan_end = $request->target_pengerjaan_end;
            $project->status = $request->status;
    
            // Fungsi untuk menyimpan gambar hanya jika ada file baru dan ukurannya valid
            if ($request->hasFile('gambarflyer')) {
                $file = $request->file('gambarflyer');
                // Cek jika ukuran file lebih dari 10MB
                if ($file->getSize() > 10 * 1024 * 1024) {
                    return redirect()->route('dashboardAdmin.view')->with('error', 'Ukuran file gambar flyer melebihi batas 10MB!');
                }
    
                // Membuat folder baru berdasarkan nama proyek
                $folderPath = public_path('images/projects/' . Str::slug($project->name)); // Menggunakan Str::slug()
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true); // Membuat folder jika belum ada
                }
    
                // Simpan gambar baru
                $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                $file->move($folderPath, $fileName);
                $project->gambarflyer = 'images/projects/' . Str::slug($project->name) . '/' . $fileName; // Menggunakan Str::slug()
            }
    
            // Simpan data proyek
            if ($project->save()) {
                return redirect()->route('dashboardAdmin.view')->with('success', 'Proyek berhasil ditambahkan!');
            }
    
            return redirect()->route('dashboardAdmin.view')->with('info', 'Tidak ada perubahan yang dilakukan.');
    
        } catch (\Exception $e) {
            return redirect()->route('dashboardAdmin.view')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    ##Detail projek
    public function showProjectDetail($status, $id)
    {
        $detailProject = Project::findOrFail($id);
        $projects = Project::where('status', $status)->get();

        // Ambil gambar berdasarkan project_id
        $projectBefores = ProjectBefore::where('project_id', $id)->get();
        $projectAfters = ProjectAfter::where('project_id', $id)->get();
        $projectVideo = ProjectVideo::where('project_id', $id)->get();
        
        return view('Admin.Detail.detailProjekAdmin',compact('detailProject', 'projectBefores', 'projectAfters', 'projectVideo', 'status'));
    }


    public function updateProject(Request $request, $status, $id)
    {
        $project = null; // Declare the $project variable outside try block
        try {
            // Validasi input
            $request->validate([
                'name' => 'nullable|string|max:255',
                'description1' => 'nullable|string|max:10000',
                'description2' => 'nullable|string|max:10000',
                'jenis_projek' => 'nullable|string|max:255',
                'target_pengerjaan_start' => 'nullable|date',
                'target_pengerjaan_end' => 'nullable|date|after_or_equal:target_pengerjaan_start',
                'status' => 'nullable|string|max:50',
                'gambarflyer' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240', // max 10MB
                'foto_before' => 'nullable|array', // Multiple files
                'foto_before.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'foto_after' => 'nullable|array', // Multiple files
                'foto_after.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'video' => 'nullable|array', // Multiple files
                'video.*' => 'nullable|mimes:mp4,mov,avi|max:1048576', // max 10MB for video
            ]);
    
            // Cari proyek berdasarkan ID
            $project = Project::findOrFail($id);
            
            // Update hanya jika ada perubahan
            if ($request->has('name') && $request->name !== $project->name) {
                $project->name = $request->name;
            }
            if ($request->has('description1') && $request->description1 !== $project->description1) {
                $project->description1 = $request->description1;
            }
            if ($request->has('description2') && $request->description2 !== $project->description2) {
                $project->description2 = $request->description2;
            }
            if ($request->has('jenis_projek') && $request->jenis_projek !== $project->jenis_projek) {
                $project->jenis_projek = $request->jenis_projek;
            }
            if ($request->has('target_pengerjaan_start') && $request->target_pengerjaan_start !== $project->target_pengerjaan_start) {
                $project->target_pengerjaan_start = $request->target_pengerjaan_start;
            }
            if ($request->has('target_pengerjaan_end') && $request->target_pengerjaan_end !== $project->target_pengerjaan_end) {
                $project->target_pengerjaan_end = $request->target_pengerjaan_end;
            }
            if ($request->has('status') && $request->status !== $project->status) {
                $project->status = $request->status;
            }
    
            // Fungsi untuk menyimpan gambar flyer jika ada perubahan
            if ($request->hasFile('gambarflyer')) {
                $file = $request->file('gambarflyer');
                if ($file->getSize() > 10 * 1024 * 1024) {
                    return redirect()->route('dashboardAdmin.view')->with('error', 'Ukuran file gambar flyer melebihi batas 10MB!');
                }
                $folderPath = public_path('images/projects/' . Str::slug($project->name));
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                $file->move($folderPath, $fileName);
                $project->gambarflyer = 'images/projects/' . Str::slug($project->name) . '/' . $fileName;
            }
    
            // Simpan data proyek yang telah diupdate jika ada perubahan
            if ($project->isDirty()) {
                $project->save();
            }
    
            // Menyimpan atau mengupdate foto before
            if ($request->hasFile('foto_before')) {
                foreach ($request->file('foto_before') as $file) {
                    $folderPath = public_path('images/projects/' . Str::slug($project->name) . '/before');
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath, 0777, true);
                    }
                    $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move($folderPath, $fileName);
    
                    // Simpan ke tabel project_befores
                    $projectBefore = new ProjectBefore();
                    $projectBefore->project_id = $project->id;
                    $projectBefore->image = 'images/projects/' . Str::slug($project->name) . '/before/' . $fileName;
                    $projectBefore->save();
                }
            }
    
            // Menyimpan atau mengupdate foto after
            if ($request->hasFile('foto_after')) {
                foreach ($request->file('foto_after') as $file) {
                    $folderPath = public_path('images/projects/' . Str::slug($project->name) . '/after');
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath, 0777, true);
                    }
                    $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move($folderPath, $fileName);
    
                    // Simpan ke tabel project_afters
                    $projectAfter = new ProjectAfter();
                    $projectAfter->project_id = $project->id;
                    $projectAfter->image = 'images/projects/' . Str::slug($project->name) . '/after/' . $fileName;
                    $projectAfter->save();
                }
            }
    
            // Menyimpan atau mengupdate video
            if ($request->hasFile('video')) {
                foreach ($request->file('video') as $file) {
                    $folderPath = public_path('videos/projects/' . Str::slug($project->name));
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath, 0777, true);
                    }
                    $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move($folderPath, $fileName);
    
                    // Simpan ke tabel project_videos
                    $projectVideo = new ProjectVideo();
                    $projectVideo->project_id = $project->id;
                    $projectVideo->video = 'videos/projects/' . Str::slug($project->name) . '/' . $fileName;
                    $projectVideo->save();
                }
            }
    
            if ($project->status === 'negotiation') {
                return redirect()->route('projectsNego.view', [
                    'status' => $project->status,
                    'id' => $project->id
                ])->with('success', 'Proyek berhasil diperbarui!');
            } else {
                return redirect()->route('projectsDetail.view', [
                    'status' => $project->status,
                    'id' => $project->id
                ])->with('success', 'Proyek berhasil diperbarui!');
            }
            
    
        } catch (\Exception $e) {
            return redirect()->route('dashboardAdmin.view')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateProjectNego(Request $request, $status, $id)
    {
        $project = null; // Declare the $project variable outside try block
        try {
            // Validasi input
            $request->validate([
                'name' => 'nullable|string|max:255',
                'description1' => 'nullable|string|max:10000',
                'jenis_projek' => 'nullable|string|max:255',
                'status' => 'nullable|string|max:50',
            ]);
    
            // Cari proyek berdasarkan ID
            $project = Project::findOrFail($id);
            
            // Update hanya jika ada perubahan
            if ($request->has('name') && $request->name !== $project->name) {
                $project->name = $request->name;
            }
            if ($request->has('description1') && $request->description1 !== $project->description1) {
                $project->description1 = $request->description1;
            }
            if ($request->has('jenis_projek') && $request->jenis_projek !== $project->jenis_projek) {
                $project->jenis_projek = $request->jenis_projek;
            }
            
            if ($request->has('status') && $request->status !== $project->status) {
                $project->status = $request->status;
            }
    
            
    
            // Simpan data proyek yang telah diupdate jika ada perubahan
            if ($project->isDirty()) {
                $project->save();
            }
    
            if ($project->status === 'negotiation') {
                return redirect()->route('projectsNego.view', [
                    'status' => $project->status,
                    'id' => $project->id
                ])->with('success', 'Proyek berhasil diperbarui!');
            } else {
                return redirect()->route('projectsDetail.view', [
                    'status' => $project->status,
                    'id' => $project->id
                ])->with('success', 'Proyek berhasil diperbarui!');
            }
            
    
        } catch (\Exception $e) {
            return redirect()->route('dashboardAdmin.view')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteImage($project_id, $image_id, $type)
    {
        try {
            // Cari proyek berdasarkan ID
            $project = Project::findOrFail($project_id);

            // Tentukan model dan path berdasarkan tipe gambar
            if ($type == 'before') {
                $image = ProjectBefore::findOrFail($image_id);
                $folderPath = public_path('images/projects/' . Str::slug($project->name) . '/before');
            } else if ($type == 'after') {
                $image = ProjectAfter::findOrFail($image_id);
                $folderPath = public_path('images/projects/' . Str::slug($project->name) . '/after');
            } else {
                return redirect()->route('projectsDetail.view', ['status' => $project->status, 'id' => $project->id])->with('error', 'Tipe gambar tidak dikenal.');
            }

            // Hapus file gambar dari folder
            $filePath = $image->image;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath)); // Menghapus file dari server
            }

            // Hapus record gambar dari database
            $image->delete();

            // Hapus folder jika kosong
            if ($this->isDirectoryEmpty($folderPath)) {
                rmdir($folderPath); // Menghapus folder jika kosong
            }

            return redirect()->route('projectsDetail.view', ['status' => $project->status, 'id' => $project->id])->with('success', 'Gambar berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('projectsDetail.view', ['status' => $project->status, 'id' => $project->id])->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteVideo($project_id, $video_id)
    {
        try {
            // Cari proyek berdasarkan ID
            $project = Project::findOrFail($project_id);

            // Cari video berdasarkan ID
            $video = ProjectVideo::findOrFail($video_id);

            // Tentukan path video dan folder
            $filePath = $video->video;
            $videoFolder = dirname(public_path($filePath)); // Folder tempat video berada

            // Hapus file video dari server
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath)); // Menghapus file dari server
            }

            // Hapus record video dari database
            $video->delete();

            // Hapus folder video jika kosong
            if ($this->isDirectoryEmpty($videoFolder)) {
                rmdir($videoFolder); // Menghapus folder video jika kosong
            }

            return redirect()->route('projectsDetail.view', ['status' => $project->status, 'id' => $project->id])->with('success', 'Video berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('projectsDetail.view', ['status' => $project->status, 'id' => $project->id])->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function isDirectoryEmpty($dir)
    {
        // Mengembalikan true jika folder kosong
        return (is_dir($dir) && count(scandir($dir)) == 2); // Hanya ada . dan .. di dalam folder
    }


    public function deleteProject($project_id)
    {
        try {
            // Cari proyek berdasarkan ID
            $project = Project::findOrFail($project_id);
            $status = $project->status;  // Ambil status proyek yang dihapus

            // Tentukan folder terkait proyek
            $projectFolder = public_path('images/projects/' . Str::slug($project->name));
            $videoFolder = public_path('videos/projects/' . Str::slug($project->name));

            // Hapus folder gambar sebelum dan sesudah proyek
            if (is_dir($projectFolder . '/before')) {
                $this->deleteFolder($projectFolder . '/before');
            }

            if (is_dir($projectFolder . '/after')) {
                $this->deleteFolder($projectFolder . '/after');
            }

            // Hapus folder video proyek jika ada
            if (is_dir($projectFolder)) {
                $this->deleteFolder($projectFolder);
            }

            // Hapus folder video proyek jika ada
            if (is_dir($videoFolder)) {
                $this->deleteFolder($videoFolder);
            }

            // Hapus proyek dari database
            $project->delete();

            // Redirect ke halaman dengan status yang sesuai
            return redirect()->route('projects.view', ['status' => $status])->with('success', 'Proyek berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('projects.view', ['status' => $status])->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Fungsi untuk menghapus folder beserta isinya
    private function deleteFolder($folderPath)
    {
        // Mengambil semua isi folder
        $files = array_diff(scandir($folderPath), array('.', '..'));

        foreach ($files as $file) {
            $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;

            if (is_dir($filePath)) {
                // Jika folder, panggil fungsi ini untuk menghapus subfolder
                $this->deleteFolder($filePath);
            } else {
                // Jika file, hapus file
                unlink($filePath);
            }
        }

        // Setelah semua file dihapus, hapus folder itu sendiri
        rmdir($folderPath);
    }

}
