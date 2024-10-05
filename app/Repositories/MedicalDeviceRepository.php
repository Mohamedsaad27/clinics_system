<?php

namespace App\Repositories;

use App\Http\Requests\Device\StoreMedicalDeviceRequest;
use App\Http\Requests\Device\UpdateMedicalDeviceRequest;
use App\Interfaces\MedicalDeviceRepositoryInterface;
use App\Models\MedicalDevice;

class MedicalDeviceRepository implements MedicalDeviceRepositoryInterface
{
    public function index()
    {
        $devices = MedicalDevice::query()->get();
        return view('admin.devices.index',compact('devices'));
    }
    public function create()
    {
        return view('admin.devices.create');
    }
    public function store(StoreMedicalDeviceRequest $storeMedicalDeviceRequest)
    {
        $validated = $storeMedicalDeviceRequest->validated();
        try{
            MedicalDevice::create($validated);
            return redirect()->route('devices.index')->with('successCreate','Medical Device created successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function show($id    )
    {
        $medicalDevice = MedicalDevice::find($id);
        return view('admin.devices.show',compact('medicalDevice'));
    }
    public function edit($id)
    {
        $device = MedicalDevice::find($id);
        return view('admin.devices.edit',compact('device'));
    }
    public function update(UpdateMedicalDeviceRequest $updateMedicalDeviceRequest, $id)
    {
        $validated = $updateMedicalDeviceRequest->validated();
        try{
            MedicalDevice::find($id)->update($validated);
            return redirect()->route('devices.index')->with('successUpdate','Medical Device updated successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function destroy($id)
    {
        try{
            MedicalDevice::find($id)->delete();
            return redirect()->route('admin.devices.index')->with('successDelete','Medical Device deleted successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
