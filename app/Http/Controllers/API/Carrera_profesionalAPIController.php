<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarrera_profesionalAPIRequest;
use App\Http\Requests\API\UpdateCarrera_profesionalAPIRequest;
use App\Models\Carrera_profesional;
use App\Repositories\Carrera_profesionalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class Carrera_profesionalController
 * @package App\Http\Controllers\API
 */

class Carrera_profesionalAPIController extends InfyOmBaseController
{
    /** @var  Carrera_profesionalRepository */
    private $carreraProfesionalRepository;

    public function __construct(Carrera_profesionalRepository $carreraProfesionalRepo)
    {
        $this->carreraProfesionalRepository = $carreraProfesionalRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/carreraProfesionals",
     *      summary="Get a listing of the Carrera_profesionals.",
     *      tags={"Carrera_profesional"},
     *      description="Get all Carrera_profesionals",
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
     *                  @SWG\Items(ref="#/definitions/Carrera_profesional")
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
        $this->carreraProfesionalRepository->pushCriteria(new RequestCriteria($request));
        $this->carreraProfesionalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $carreraProfesionals = $this->carreraProfesionalRepository->all();

        return $this->sendResponse($carreraProfesionals->toArray(), 'Carrera_profesionals retrieved successfully');
    }

    /**
     * @param CreateCarrera_profesionalAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/carreraProfesionals",
     *      summary="Store a newly created Carrera_profesional in storage",
     *      tags={"Carrera_profesional"},
     *      description="Store Carrera_profesional",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Carrera_profesional that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Carrera_profesional")
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
     *                  ref="#/definitions/Carrera_profesional"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCarrera_profesionalAPIRequest $request)
    {
        $input = $request->all();

        $carreraProfesionals = $this->carreraProfesionalRepository->create($input);

        return $this->sendResponse($carreraProfesionals->toArray(), 'Carrera_profesional saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/carreraProfesionals/{id}",
     *      summary="Display the specified Carrera_profesional",
     *      tags={"Carrera_profesional"},
     *      description="Get Carrera_profesional",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Carrera_profesional",
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
     *                  ref="#/definitions/Carrera_profesional"
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
        /** @var Carrera_profesional $carreraProfesional */
        $carreraProfesional = $this->carreraProfesionalRepository->find($id);

        if (empty($carreraProfesional)) {
            return Response::json(ResponseUtil::makeError('Carrera_profesional not found'), 404);
        }

        return $this->sendResponse($carreraProfesional->toArray(), 'Carrera_profesional retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCarrera_profesionalAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/carreraProfesionals/{id}",
     *      summary="Update the specified Carrera_profesional in storage",
     *      tags={"Carrera_profesional"},
     *      description="Update Carrera_profesional",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Carrera_profesional",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Carrera_profesional that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Carrera_profesional")
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
     *                  ref="#/definitions/Carrera_profesional"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCarrera_profesionalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Carrera_profesional $carreraProfesional */
        $carreraProfesional = $this->carreraProfesionalRepository->find($id);

        if (empty($carreraProfesional)) {
            return Response::json(ResponseUtil::makeError('Carrera_profesional not found'), 404);
        }

        $carreraProfesional = $this->carreraProfesionalRepository->update($input, $id);

        return $this->sendResponse($carreraProfesional->toArray(), 'Carrera_profesional updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/carreraProfesionals/{id}",
     *      summary="Remove the specified Carrera_profesional from storage",
     *      tags={"Carrera_profesional"},
     *      description="Delete Carrera_profesional",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Carrera_profesional",
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
        /** @var Carrera_profesional $carreraProfesional */
        $carreraProfesional = $this->carreraProfesionalRepository->find($id);

        if (empty($carreraProfesional)) {
            return Response::json(ResponseUtil::makeError('Carrera_profesional not found'), 404);
        }

        $carreraProfesional->delete();

        return $this->sendResponse($id, 'Carrera_profesional deleted successfully');
    }
}
