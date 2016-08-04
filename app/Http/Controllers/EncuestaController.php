<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEncuestaRequest;
use App\Http\Requests\UpdateEncuestaRequest;
use App\Repositories\EncuestaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EncuestaController extends InfyOmBaseController
{
    /** @var  EncuestaRepository */
    private $encuestaRepository;

    public function __construct(EncuestaRepository $encuestaRepo)
    {
        $this->encuestaRepository = $encuestaRepo;
    }

    /**
     * Display a listing of the Encuesta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->encuestaRepository->pushCriteria(new RequestCriteria($request));
        $encuestas = $this->encuestaRepository->all();

        return view('encuestas.index')
            ->with('encuestas', $encuestas);
    }

    /**
     * Show the form for creating a new Encuesta.
     *
     * @return Response
     */
    public function create()
    {
        return view('encuestas.create');
    }

    /**
     * Store a newly created Encuesta in storage.
     *
     * @param CreateEncuestaRequest $request
     *
     * @return Response
     */
    public function store(CreateEncuestaRequest $request)
    {
        $input = $request->all();

        $encuesta = $this->encuestaRepository->create($input);

        Flash::success('Encuesta saved successfully.');

        return redirect(route('encuestas.index'));
    }

    /**
     * Display the specified Encuesta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $encuesta = $this->encuestaRepository->findWithoutFail($id);

        if (empty($encuesta)) {
            Flash::error('Encuesta not found');

            return redirect(route('encuestas.index'));
        }

        return view('encuestas.show')->with('encuesta', $encuesta);
    }

    /**
     * Show the form for editing the specified Encuesta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $encuesta = $this->encuestaRepository->findWithoutFail($id);

        if (empty($encuesta)) {
            Flash::error('Encuesta not found');

            return redirect(route('encuestas.index'));
        }

        return view('encuestas.edit')->with('encuesta', $encuesta);
    }

    /**
     * Update the specified Encuesta in storage.
     *
     * @param  int              $id
     * @param UpdateEncuestaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEncuestaRequest $request)
    {
        $encuesta = $this->encuestaRepository->findWithoutFail($id);

        if (empty($encuesta)) {
            Flash::error('Encuesta not found');

            return redirect(route('encuestas.index'));
        }

        $encuesta = $this->encuestaRepository->update($request->all(), $id);

        Flash::success('Encuesta updated successfully.');

        return redirect(route('encuestas.index'));
    }

    /**
     * Remove the specified Encuesta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $encuesta = $this->encuestaRepository->findWithoutFail($id);

        if (empty($encuesta)) {
            Flash::error('Encuesta not found');

            return redirect(route('encuestas.index'));
        }

        $this->encuestaRepository->delete($id);

        Flash::success('Encuesta deleted successfully.');

        return redirect(route('encuestas.index'));
    }
}
