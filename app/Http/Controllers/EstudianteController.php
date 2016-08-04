<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Repositories\EstudianteRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstudianteController extends InfyOmBaseController
{
    /** @var  EstudianteRepository */
    private $estudianteRepository;

    public function __construct(EstudianteRepository $estudianteRepo)
    {
        $this->estudianteRepository = $estudianteRepo;
    }

    /**
     * Display a listing of the Estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estudianteRepository->pushCriteria(new RequestCriteria($request));
        $estudiantes = $this->estudianteRepository->all();

        return view('estudiantes.index')
            ->with('estudiantes', $estudiantes);
    }

    /**
     * Show the form for creating a new Estudiante.
     *
     * @return Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created Estudiante in storage.
     *
     * @param CreateEstudianteRequest $request
     *
     * @return Response
     */
    public function store(CreateEstudianteRequest $request)
    {
        $input = $request->all();

        $estudiante = $this->estudianteRepository->create($input);

        Flash::success('Estudiante saved successfully.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Display the specified Estudiante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante not found');

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.show')->with('estudiante', $estudiante);
    }

    /**
     * Show the form for editing the specified Estudiante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante not found');

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.edit')->with('estudiante', $estudiante);
    }

    /**
     * Update the specified Estudiante in storage.
     *
     * @param  int              $id
     * @param UpdateEstudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstudianteRequest $request)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante not found');

            return redirect(route('estudiantes.index'));
        }

        $estudiante = $this->estudianteRepository->update($request->all(), $id);

        Flash::success('Estudiante updated successfully.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Remove the specified Estudiante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante not found');

            return redirect(route('estudiantes.index'));
        }

        $this->estudianteRepository->delete($id);

        Flash::success('Estudiante deleted successfully.');

        return redirect(route('estudiantes.index'));
    }
}
