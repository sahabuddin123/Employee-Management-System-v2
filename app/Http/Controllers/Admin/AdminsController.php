<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\AdminContract;
use App\Http\Controllers\BaseController;

class AdminsController extends BaseController
{
    /**
     * @var AdminContract
     */
    protected $adminRepository;
 
    /**
     * CategoryController constructor.
     * @param AdminContract $adminRepository
     */
    public function __construct(AdminContract $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
 
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admin = $this->adminRepository->listAdmin();
 
        $this->setPageTitle('Admin', 'List of all admins');
        return view('admin.admin.index', compact('admin'));
 

    }
    /**
     * create new admin 
     * 
     */
    public function create()
    {
        $admin = $this->adminRepository->listAdmin('id', 'asc');
    
        $this->setPageTitle('Admin', 'Create Admin');
        return view('admin.admin.create', compact('admin'));
    }
    /**
     * Store new admin
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username'      =>  'required|max:191',
            'first_name'    =>  'required|max:20',
            'last_name'     =>  'required|max:20',
            'email'         =>  'required|email',
            'password'      =>  'required|min:6',
            'picture'       =>  'mimes:jpg,jpeg,png|max:1000'
        ]);
    
        $params = $request->except('_token');
    
        $admin = $this->adminRepository->createAdmin($params);
    
        if (!$admin) {
            return $this->responseRedirectBack('Error occurred while creating admin.', 'error', true, true);
        }
        return $this->responseRedirect('admin.adminuser.index', 'Admin added successfully' ,'success',false, false);
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = $this->adminRepository->findAdminById($id);
        $admins = $this->adminRepository->listAdmin();
        $this->setPageTitle('Admin', 'Edit Admin : '.$admin->name);
        return view('admin.admin.edit', compact('admins', 'admin'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'username'      =>  'required|max:191',
            'email'         =>  'required|email',
            'picture'         =>  'mimes:jpg,jpeg,png|max:1000'
        ]);
    
        $params = $request->except('_token');
    
        $admin = $this->adminRepository->updateAdmin($params);
    
        if (!$admin) {
            return $this->responseRedirectBack('Error occurred while updating admin.', 'error', true, true);
        }
        return $this->responseRedirectBack('admin updated successfully' ,'success',false, false);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $admin = $this->adminRepository->deleteAdmin($id);
    
        if (!$admin) {
            return $this->responseRedirectBack('Error occurred while deleting admin.', 'error', true, true);
        }
        return $this->responseRedirect('admin.adminuser.index', 'admin deleted successfully' ,'success',false, false);
}
}
