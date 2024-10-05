<?php

namespace App\Http\Controllers;

use App\Http\Requests\Device\StoreMedicalDeviceRequest;
use App\Http\Requests\Device\UpdateMedicalDeviceRequest;
use App\Interfaces\MedicalDeviceRepositoryInterface;
use App\Models\MedicalDevice;
use App\Repositories\MedicalDeviceRepository;
use Illuminate\Http\Request;

class MedicalDeviceController extends Controller
{
    protected $medicalDeviceRepository;
    public function __construct(MedicalDeviceRepositoryInterface $medicalDeviceRepository){
        $this->medicalDeviceRepository = $medicalDeviceRepository;
    }
    public function index(){
        return $this->medicalDeviceRepository->index();
    }
    public function create(){
        return $this->medicalDeviceRepository->create();
    }
    public function store(StoreMedicalDeviceRequest $request){
        return  $this->medicalDeviceRepository->store($request);
    }
    public function show($id){
        return $this->medicalDeviceRepository->show($id);
    }
    public function edit($id)
    {
        return $this->medicalDeviceRepository->edit($id);
    }
    public function update(UpdateMedicalDeviceRequest $request, $id){
        return $this->medicalDeviceRepository->update($request, $id);
    }
    public function destroy($id){
        return $this->medicalDeviceRepository->destroy($id);
    }
}
