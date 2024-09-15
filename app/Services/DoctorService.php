<?php

namespace App\Services;

use App\Repositories\DoctorRepository;
use App\Http\Requests\StoreDoctorRequest;

class DoctorService
{
    protected $doctorRepository;
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }
    public function create( )
    {
        return $this->doctorRepository->create();
    }
}
