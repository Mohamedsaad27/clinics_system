<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ClinicRepositoryInterface;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Requests\Clinic\UpdateClinicRequest;

class ClinicController extends Controller
{
    private $clinicRepository;

    public function __construct(ClinicRepositoryInterface $clinicRepository)
    {
        $this->clinicRepository = $clinicRepository;
    }

    public function index()
    {
        return $this->clinicRepository->index();
    }

    public function create()
    {
        return $this->clinicRepository->create();
    }

    public function store(StoreClinicRequest $request)
    {
        return $this->clinicRepository->store($request);
    }

    public function show(Clinic $clinic)
    {
        return $this->clinicRepository->show($clinic);
    }

    public function edit(Clinic $clinic)
    {
        return $this->clinicRepository->edit($clinic);
    }

    public function update(UpdateClinicRequest $request, Clinic $clinic)
    {
        return $this->clinicRepository->update($request, $clinic);
    }

    public function destroy(Clinic $clinic)
    {
        return $this->clinicRepository->destroy($clinic);
    }

}
