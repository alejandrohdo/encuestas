<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCarreraProfesioanlRequest;
use App\Http\Requests\UpdateCarreraProfesioanlRequest;
use App\Repositories\CarreraProfesioanlRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CarreraProfesioanlController extends InfyOmBaseController
{
    /** @var  CarreraProfesioanlRepository */
    private $carreraProfesioanlRepository;

    public function __construct(CarreraProfesioanlRepository $carreraProfesioanlRepo)
    {
        $this->carreraProfesioanlRepository = $carreraProfesioanlRepo;
    }

    /**
     * Display a listing of the CarreraProfesioanl.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->carreraProfesioanlRepository->pushCriteria(new RequestCriteria($request));
        $carreraProfesioanls = $this->carreraProfesioanlRepository->all();

        return view('carreraProfesioanls.index')
            ->with('carreraProfesioanls', $carreraProfesioanls);
    }

    /**
     * Show the form for creating a new CarreraProfesioanl.
     *
     * @return Response
     */
    public function create()
    {
        return view('carreraProfesioanls.create');
    }

    /**
     * Store a newly created CarreraProfesioanl in storage.
     *
     * @param CreateCarreraProfesioanlRequest $request
     *
     * @return Response
     */
    public function store(CreateCarreraProfesioanlRequest $request)
    {
        $input = $request->all();

        $carreraProfesioanl = $this->carreraProfesioanlRepository->create($input);

        Flash::success('CarreraProfesioanl saved successfully.');

        return redirect(route('carreraProfesioanls.index'));
    }

    /**
     * Display the specified CarreraProfesioanl.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carreraProfesioanl = $this->carreraProfesioanlRepository->findWithoutFail($id);

        if (empty($carreraProfesioanl)) {
            Flash::error('CarreraProfesioanl not found');

            return redirect(route('carreraProfesioanls.index'));
        }

        return view('carreraProfesioanls.show')->with('carreraProfesioanl', $carreraProfesioanl);
    }

    /**
     * Show the form for editing the specified CarreraProfesioanl.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carreraProfesioanl = $this->carreraProfesioanlRepository->findWithoutFail($id);

        if (empty($carreraProfesioanl)) {
            Flash::error('CarreraProfesioanl not found');

            return redirect(route('carreraProfesioanls.index'));
        }

        return view('carreraProfesioanls.edit')->with('carreraProfesioanl', $carreraProfesioanl);
    }

    /**
     * Update the specified CarreraProfesioanl in storage.
     *
     * @param  int              $id
     * @param UpdateCarreraProfesioanlRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarreraProfesioanlRequest $request)
    {
        $carreraProfesioanl = $this->carreraProfesioanlRepository->findWithoutFail($id);

        if (empty($carreraProfesioanl)) {
            Flash::error('CarreraProfesioanl not found');

            return redirect(route('carreraProfesioanls.index'));
        }

        $carreraProfesioanl = $this->carreraProfesioanlRepository->update($request->all(), $id);

        Flash::success('CarreraProfesioanl updated successfully.');

        return redirect(route('carreraProfesioanls.index'));
    }

    /**
     * Remove the specified CarreraProfesioanl from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carreraProfesioanl = $this->carreraProfesioanlRepository->findWithoutFail($id);

        if (empty($carreraProfesioanl)) {
            Flash::error('CarreraProfesioanl not found');

            return redirect(route('carreraProfesioanls.index'));
        }

        $this->carreraProfesioanlRepository->delete($id);

        Flash::success('CarreraProfesioanl deleted successfully.');

        return redirect(route('carreraProfesioanls.index'));
    }
}
