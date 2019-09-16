<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Contracts\StateContract;
use App\Http\Controllers\BaseController;


class StatesController extends BaseController
{
    /* @var StateContract
    */
   protected $stateRepository;

   /**
    * CategoryController constructor.
    */ /*@param CategoryContract $categoryRepository
    */
   public function __construct(StateContract $stateRepository)
   {
       $this->stateRepository = $stateRepository;
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function index()
   {
       $state = $this->stateRepository->listState();

       $this->setPageTitle('State', 'List of all States');
       return view('admin.state.index', compact('state'));

   }
   public function create()
{
    $state = $this->stateRepository->listState('id', 'asc');
 
    $this->setPageTitle('State', 'Create State');
    return view('admin.state.create', compact('state'));
}
    public function store(Request $request)
    {
        $this->validate($request, [
            'state_name'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $state = $this->stateRepository->createState($params);
    
        if (!$state) {
            return $this->responseRedirectBack('Error occurred while creating State.', 'error', true, true);
        }
        return $this->responseRedirect('admin.state.index', 'State added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $targetstate = $this->stateRepository->findStateById($id);
        $state = $this->stateRepository->listState();
    
        $this->setPageTitle('State', 'Edit State : '.$targetstate->name);
        return view('admin.state.edit', compact('state', 'targetstate'));
    }
   
    public function update(Request $request)
    {
        $this->validate($request, [
            'state_name'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $state = $this->stateRepository->updateState($params);
    
        if (!$state) {
            return $this->responseRedirectBack('Error occurred while updating State.', 'error', true, true);
        }
        return $this->responseRedirectBack('State updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $state = $this->stateRepository->deleteState($id);
 
    if (!$state) {
        return $this->responseRedirectBack('Error occurred while deleting State.', 'error', true, true);
    }
    return $this->responseRedirect('admin.state.index', 'State deleted successfully' ,'success',false, false);
}
}


