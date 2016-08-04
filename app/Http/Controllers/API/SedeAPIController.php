<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSedeAPIRequest;
use App\Http\Requests\API\UpdateSedeAPIRequest;
use App\Models\Sede;
use App\Repositories\SedeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SedeController
 * @package App\Http\Controllers\API
 */

class SedeAPIController extends InfyOmBaseController
{
    /** @var  SedeRepository */
    private $sedeRepository;

    public function __construct(SedeRepository $sedeRepo)
    {
        $this->sedeRepository = $sedeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sedes",
     *      summary="Get a listing of the Sedes.",
     *      tags={"Sede"},
     *      description="Get all Sedes",
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
     *                  @SWG\Items(ref="#/definitions/Sede")
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
        $this->sedeRepository->pushCriteria(new RequestCriteria($request));
        $this->sedeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sedes = $this->sedeRepository->all();

        return $this->sendResponse($sedes->toArray(), 'Sedes retrieved successfully');
    }

    /**
     * @param CreateSedeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sedes",
     *      summary="Store a newly created Sede in storage",
     *      tags={"Sede"},
     *      description="Store Sede",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sede that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sede")
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
     *                  ref="#/definitions/Sede"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSedeAPIRequest $request)
    {
        $input = $request->all();

        $sedes = $this->sedeRepository->create($input);

        return $this->sendResponse($sedes->toArray(), 'Sede saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sedes/{id}",
     *      summary="Display the specified Sede",
     *      tags={"Sede"},
     *      description="Get Sede",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sede",
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
     *                  ref="#/definitions/Sede"
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
        /** @var Sede $sede */
        $sede = $this->sedeRepository->find($id);

        if (empty($sede)) {
            return Response::json(ResponseUtil::makeError('Sede not found'), 404);
        }

        return $this->sendResponse($sede->toArray(), 'Sede retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSedeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sedes/{id}",
     *      summary="Update the specified Sede in storage",
     *      tags={"Sede"},
     *      description="Update Sede",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sede",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sede that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sede")
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
     *                  ref="#/definitions/Sede"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSedeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sede $sede */
        $sede = $this->sedeRepository->find($id);

        if (empty($sede)) {
            return Response::json(ResponseUtil::makeError('Sede not found'), 404);
        }

        $sede = $this->sedeRepository->update($input, $id);

        return $this->sendResponse($sede->toArray(), 'Sede updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sedes/{id}",
     *      summary="Remove the specified Sede from storage",
     *      tags={"Sede"},
     *      description="Delete Sede",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sede",
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
        /** @var Sede $sede */
        $sede = $this->sedeRepository->find($id);

        if (empty($sede)) {
            return Response::json(ResponseUtil::makeError('Sede not found'), 404);
        }

        $sede->delete();

        return $this->sendResponse($id, 'Sede deleted successfully');
    }
}
