<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Interfaces\ShiftRepositoryInterface;

class ShiftController extends Controller
{
    protected $shiftRepository;

    public function __construct(ShiftRepositoryInterface $shiftRepository)
    {
        $this->shiftRepository = $shiftRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->shiftRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->shiftRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftRequest $request)
    {
        return $this->shiftRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        return $this->shiftRepository->show($shift);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        return $this->shiftRepository->edit($shift);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        return $this->shiftRepository->update($request, $shift);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        return $this->shiftRepository->destroy($shift);
    }
}
