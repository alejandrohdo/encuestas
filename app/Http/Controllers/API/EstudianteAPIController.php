<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstudianteAPIRequest;
use App\Http\Requests\API\UpdateEstudianteAPIRequest;
use App\Models\Estudiante;
use App\Repositories\EstudianteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EstudianteController
 * @package App\Http\Controllers\API
 */

class EstudianteAPIController extends InfyOmBaseController
{
    /** @var  EstudianteRepository */
    private $estudianteRepository;

    public function __construct(EstudianteRepository $estudianteRepo)
    {
        $this->estudianteRepository = $estudianteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/estudiantes",
     *      summary="Get a listing of the Estudiantes.",
     *      tags={"Estudiante"},
     *      description="Get all Estudiantes",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Estudiante")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->estudianteRepository->pushCriteria(new RequestCriteria($request));
        $this->estudianteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estudiantes = $this->estudianteRepository->all();

        return $this->sendResponse($estudiantes->toArray(), 'Estudiantes retrieved successfully');
    }

    /**
     * @param CreateEstudianteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/estudiantes",
     *      summary="Store a newly created Estudiante in storage",
     *      tags={"Estudiante"},
     *      description="Store Estudiante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Estudiante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Estudiante")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Estudiante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEstudianteAPIRequest $request)
    {
        $input = $request->all();

        $estudiantes = $this->estudianteRepository->create($input);

        return $this->sendResponse($estudiantes->toArray(), 'Estudiante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/estudiantes/{id}",
     *      summary="Display the specified Estudiante",
     *      tags={"Estudiante"},
     *      description="Get Estudiante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Estudiante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Estudiante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Estudiante $estudiante */
        $estudiante = $this->estudianteRepository->find($id);

        if (empty($estudiante)) {
            return Response::json(ResponseUtil::makeError('Estudiante not found'), 404);
        }

        return $this->sendResponse($estudiante->toArray(), 'Estudiante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEstudianteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/estudiantes/{id}",
     *      summary="Update the specified Estudiante in storage",
     *      tags={"Estudiante"},
     *      description="Update Estudiante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Estudiante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Estudiante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Estudiante")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Estudiante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEstudianteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Estudiante $estudiante */
        $estudiante = $this->estudianteRepository->find($id);

        if (empty($estudiante)) {
            return Response::json(ResponseUtil::makeError('Estudiante not found'), 404);
        }

        $estudiante = $this->estudianteRepository->update($input, $id);

        return $this->sendResponse($estudiante->toArray(), 'Estudiante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/estudiantes/{id}",
     *      summary="Remove the specified Estudiante from storage",
     *      tags={"Estudiante"},
     *      description="Delete Estudiante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Estudiante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Estudiante $estudiante */
        $estudiante = $this->estudianteRepository->find($id);

        if (empty($estudiante)) {
            return Response::json(ResponseUtil::makeError('Estudiante not found'), 404);
        }

        $estudiante->delete();

        return $this->sendResponse($id, 'Estudiante deleted successfully');
    }
}
