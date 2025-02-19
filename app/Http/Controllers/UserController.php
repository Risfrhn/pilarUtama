<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landingModel as ModalData;
use App\Models\projectModel as Project;
use App\Models\projectBefore as ProjectBefore;
use App\Models\projectAfter as ProjectAfter;
use App\Models\projectVideo as ProjectVideo;


class UserController extends Controller
{
    public function showLandingPageUser()
    {
        $modalData = ModalData::all(); 
        // Mengambil proyek berdasarkan status
        $finishedProjects = Project::where('status', 'finished')->count();
        $ongoingProjects = Project::where('status', 'ongoing')->count();
        $designProjects = Project::where('status', 'beingDesign')->count();
        $negotiationProjects = Project::where('status', 'negotiation')->count();

        return view('User.Landing.landingPage', compact(
            'modalData',
            'finishedProjects',
            'ongoingProjects',
            'designProjects',
            'negotiationProjects'));
    }


    public function showProjectUser(Request $request, $status)
    {
        $projects = Project::where('status', $status)->get();

        $query = Project::query();
    
        // Filter by status
        $query->where('status', $status);
    
        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Filter by jenis_projek
        if ($request->filled('jenis_projek')) {
            $query->where('jenis_projek', $request->jenis_projek);
        }
    
        $projects = $query->paginate(8); 
        

        return view('User.List.listProjek', compact(
            'projects',
            'status',
        ));
    }

    ###List projek Nego
    public function showProjectNegoUser(Request $request, $status)
    {
        $projects = Project::where('status', $status)->get();

        $query = Project::query();
    
        // Filter by status
        $query->where('status', $status);
    
        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Filter by jenis_projek
        if ($request->filled('jenis_projek')) {
            $query->where('jenis_projek', $request->jenis_projek);
        }
    
        $projects = $query->paginate(8); 

        return view('User.List.listProjekNego', compact('projects','status'));
    }

    #####Detail projek
    public function showProjectDetailUser($status, $id)
    {
        $detailProject = Project::findOrFail($id);
        $projects = Project::where('status', $status)->get();

        // Ambil gambar berdasarkan project_id
        $projectBefores = ProjectBefore::where('project_id', $id)->get();
        $projectAfters = ProjectAfter::where('project_id', $id)->get();
        $projectVideo = ProjectVideo::where('project_id', $id)->get();
        
        return view('User.Detail.detailProjek',compact('detailProject', 'projectBefores', 'projectAfters', 'projectVideo', 'status'));
    }
}
