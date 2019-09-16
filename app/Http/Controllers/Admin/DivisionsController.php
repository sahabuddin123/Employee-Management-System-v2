<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Contracts\DivisionContract;
use App\Http\Controllers\BaseController;


class DivisionsController extends BaseController
{
    /* @var DivisionContract
    */
   protected $divisionRepository;

   /**
    * CategoryController constructor.
    */ /*@param CategoryContract $categoryRepository
    */
   public function __construct(DivisionContract $divisionRepository)
   {
       $this->divisionRepository = $divisionRepository;
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function index()
   {
       $division = $this->divisionRepository->listDivision();

       $this->setPageTitle('Division', 'List of all Divisions');
       return view('admin.division.index', compact('division'));

   }
   public function create()
{
    $division = $this->divisionRepository->listDivision('id', 'asc');
 
    $this->setPageTitle('Division', 'Create Division');
    return view('admin.division.create', compact('division'));
}
    public function store(Request $request)
    {
        $this->validate($request, [
            'division_name'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $division = $this->divisionRepository->createDivision($params);
    
        if (!$division) {
            return $this->responseRedirectBack('Error occurred while creating Division.', 'error', true, true);
        }
        return $this->responseRedirect('admin.division.index', 'Division added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $targetdivision = $this->divisionRepository->findDivisionById($id);
        $division = $this->divisionRepository->listDivision();
    
        $this->setPageTitle('Division', 'Edit Division : '.$targetdivision->name);
        return view('admin.division.edit', compact('division', 'targetdivision'));
    }
   
    public function update(Request $request)
    {
        $this->validate($request, [
            'division_name'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $division = $this->divisionRepository->updateDivision($params);
    
        if (!$division) {
            return $this->responseRedirectBack('Error occurred while updating Division.', 'error', true, true);
        }
        return $this->responseRedirectBack('Division updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $state = $this->stateRepository->deleteDivision($id);
 
    if (!$state) {
        return $this->responseRedirectBack('Error occurred while deleting State.', 'error', true, true);
    }
    return $this->responseRedirect('admin.state.index', 'Division deleted successfully' ,'success',false, false);
}
}



