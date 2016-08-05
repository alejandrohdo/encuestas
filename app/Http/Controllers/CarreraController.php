<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Repositories\CarreraRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CarreraController extends InfyOmBaseController
{
    /** @var  CarreraRepository */
    private $carreraRepository;

    public function __construct(CarreraRepository $carreraRepo)
    {
        $this->carreraRepository = $carreraRepo;
    }

    /**
     * Display a listing of the Carrera.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->carreraRepository->pushCriteria(new RequestCriteria($request));
        $carreras = $this->carreraRepository->all();

        return view('carreras.index')
            ->with('carreras', $carreras);
    }

    /**
     * Show the form for creating a new Carrera.
     *
     * @return Response
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Store a newly created Carrera in storage.
     *
     * @param CreateCarreraRequest $request
     *
     * @return Response
     */
    public function store(CreateCarreraRequest $request)
    {
        $input = $request->all();

        $carrera = $this->carreraRepository->create($input);

        Flash::success('Carrera saved successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Display the specified Carrera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        return view('carreras.show')->with('carrera', $carrera);
    }

    /**
     * Show the form for editing the specified Carrera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        return view('carreras.edit')->with('carrera', $carrera);
    }

    /**
     * Update the specified Carrera in storage.
     *
     * @param  int              $id
     * @param UpdateCarreraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarreraRequest $request)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        $carrera = $this->carreraRepository->update($request->all(), $id);

        Flash::success('Carrera updated successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Remove the specified Carrera from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        $this->carreraRepository->delete($id);

        Flash::success('Carrera deleted successfully.');

        return redirect(route('carreras.index'));
    }
}
