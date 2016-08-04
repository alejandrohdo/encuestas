<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarreraProfesioanlAPIRequest;
use App\Http\Requests\API\UpdateCarreraProfesioanlAPIRequest;
use App\Models\CarreraProfesioanl;
use App\Repositories\CarreraProfesioanlRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CarreraProfesioanlController
 * @package App\Http\Controllers\API
 */

class CarreraProfesioanlAPIController extends InfyOmBaseController
{
    /** @var  CarreraProfesioanlRepository */
    private $carreraProfesioanlRepository;

    public function __construct(CarreraProfesioanlRepository $carreraProfesioanlRepo)
    {
        $this->carreraProfesioanlRepository = $carreraProfesioanlRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/carreraProfesioanls",
     *      summary="Get a listing of the CarreraProfesioanls.",
     *      tags={"CarreraProfesioanl"},
     *      description="Get all CarreraProfesioanls",
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
     *                  @SWG\Items(ref="#/definitions/CarreraProfesioanl")
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
        $this->carreraProfesioanlRepository->pushCriteria(new RequestCriteria($request));
        $this->carreraProfesioanlRepository->pushCriteria(new LimitOffsetCriteria($request));
        $carreraProfesioanls = $this->carreraProfesioanlRepository->all();

        return $this->sendResponse($carreraProfesioanls->toArray(), 'CarreraProfesioanls retrieved successfully');
    }

    /**
     * @param CreateCarreraProfesioanlAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/carreraProfesioanls",
     *      summary="Store a newly created CarreraProfesioanl in storage",
     *      tags={"CarreraProfesioanl"},
     *      description="Store CarreraProfesioanl",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CarreraProfesioanl that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CarreraProfesioanl")
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
     *                  ref="#/definitions/CarreraProfesioanl"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCarreraProfesioanlAPIRequest $request)
    {
        $input = $request->all();

        $carreraProfesioanls = $this->carreraProfesioanlRepository->create($input);

        return $this->sendResponse($carreraProfesioanls->toArray(), 'CarreraProfesioanl saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/carreraProfesioanls/{id}",
     *      summary="Display the specified CarreraProfesioanl",
     *      tags={"CarreraProfesioanl"},
     *      description="Get CarreraProfesioanl",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CarreraProfesioanl",
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
     *                  ref="#/definitions/CarreraProfesioanl"
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
        /** @var CarreraProfesioanl $carreraProfesioanl */
        $carreraProfesioanl = $this->carreraProfesioanlRepository->find($id);

        if (empty($carreraProfesioanl)) {
            return Response::json(ResponseUtil::makeError('CarreraProfesioanl not found'), 404);
        }

        return $this->sendResponse($carreraProfesioanl->toArray(), 'CarreraProfesioanl retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCarreraProfesioanlAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/carreraProfesioanls/{id}",
     *      summary="Update the specified CarreraProfesioanl in storage",
     *      tags={"CarreraProfesioanl"},
     *      description="Update CarreraProfesioanl",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CarreraProfesioanl",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CarreraProfesioanl that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CarreraProfesioanl")
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
     *                  ref="#/definitions/CarreraProfesioanl"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCarreraProfesioanlAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarreraProfesioanl $carreraProfesioanl */
        $carreraProfesioanl = $this->carreraProfesioanlRepository->find($id);

        if (empty($carreraProfesioanl)) {
            return Response::json(ResponseUtil::makeError('CarreraProfesioanl not found'), 404);
        }

        $carreraProfesioanl = $this->carreraProfesioanlRepository->update($input, $id);

        return $this->sendResponse($carreraProfesioanl->toArray(), 'CarreraProfesioanl updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/carreraProfesioanls/{id}",
     *      summary="Remove the specified CarreraProfesioanl from storage",
     *      tags={"CarreraProfesioanl"},
     *      description="Delete CarreraProfesioanl",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CarreraProfesioanl",
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
        /** @var CarreraProfesioanl $carreraProfesioanl */
        $carreraProfesioanl = $this->carreraProfesioanlRepository->find($id);

        if (empty($carreraProfesioanl)) {
            return Response::json(ResponseUtil::makeError('CarreraProfesioanl not found'), 404);
        }

        $carreraProfesioanl->delete();

        return $this->sendResponse($id, 'CarreraProfesioanl deleted successfully');
    }
}
