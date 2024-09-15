<?php

namespace App\Services;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use App\Repositories\DoctorRepository;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use Illuminate\Http\Request;
class DoctorService
{
    protected $doctorRepository;
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }
    public function index()
    {
        return $this->doctorRepository->index();
    }
    public function create( )
    {
        return $this->doctorRepository->create();
    }
    public function store(Request $request)
    {
       return $this->doctorRepository->store($request);
    }
}
