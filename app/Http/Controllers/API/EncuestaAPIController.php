<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEncuestaAPIRequest;
use App\Http\Requests\API\UpdateEncuestaAPIRequest;
use App\Models\Encuesta;
use App\Repositories\EncuestaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EncuestaController
 * @package App\Http\Controllers\API
 */

class EncuestaAPIController extends InfyOmBaseController
{
    /** @var  EncuestaRepository */
    private $encuestaRepository;

    public function __construct(EncuestaRepository $encuestaRepo)
    {
        $this->encuestaRepository = $encuestaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/encuestas",
     *      summary="Get a listing of the Encuestas.",
     *      tags={"Encuesta"},
     *      description="Get all Encuestas",
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
     *                  @SWG\Items(ref="#/definitions/Encuesta")
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
        $this->encuestaRepository->pushCriteria(new RequestCriteria($request));
        $this->encuestaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $encuestas = $this->encuestaRepository->all();

        return $this->sendResponse($encuestas->toArray(), 'Encuestas retrieved successfully');
    }

    /**
     * @param CreateEncuestaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/encuestas",
     *      summary="Store a newly created Encuesta in storage",
     *      tags={"Encuesta"},
     *      description="Store Encuesta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Encuesta that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Encuesta")
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
     *                  ref="#/definitions/Encuesta"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEncuestaAPIRequest $request)
    {
        $input = $request->all();

        $encuestas = $this->encuestaRepository->create($input);

        return $this->sendResponse($encuestas->toArray(), 'Encuesta saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/encuestas/{id}",
     *      summary="Display the specified Encuesta",
     *      tags={"Encuesta"},
     *      description="Get Encuesta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Encuesta",
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
     *                  ref="#/definitions/Encuesta"
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
        /** @var Encuesta $encuesta */
        $encuesta = $this->encuestaRepository->find($id);

        if (empty($encuesta)) {
            return Response::json(ResponseUtil::makeError('Encuesta not found'), 404);
        }

        return $this->sendResponse($encuesta->toArray(), 'Encuesta retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEncuestaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/encuestas/{id}",
     *      summary="Update the specified Encuesta in storage",
     *      tags={"Encuesta"},
     *      description="Update Encuesta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Encuesta",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Encuesta that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Encuesta")
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
     *                  ref="#/definitions/Encuesta"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEncuestaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Encuesta $encuesta */
        $encuesta = $this->encuestaRepository->find($id);

        if (empty($encuesta)) {
            return Response::json(ResponseUtil::makeError('Encuesta not found'), 404);
        }

        $encuesta = $this->encuestaRepository->update($input, $id);

        return $this->sendResponse($encuesta->toArray(), 'Encuesta updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/encuestas/{id}",
     *      summary="Remove the specified Encuesta from storage",
     *      tags={"Encuesta"},
     *      description="Delete Encuesta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Encuesta",
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
        /** @var Encuesta $encuesta */
        $encuesta = $this->encuestaRepository->find($id);

        if (empty($encuesta)) {
            return Response::json(ResponseUtil::makeError('Encuesta not found'), 404);
        }

        $encuesta->delete();

        return $this->sendResponse($id, 'Encuesta deleted successfully');
    }
}
