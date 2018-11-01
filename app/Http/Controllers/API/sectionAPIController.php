<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesectionAPIRequest;
use App\Http\Requests\API\UpdatesectionAPIRequest;
use App\Models\section;
use App\Repositories\sectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class sectionController
 * @package App\Http\Controllers\API
 */

class sectionAPIController extends AppBaseController
{
    /** @var  sectionRepository */
    private $sectionRepository;

    public function __construct(sectionRepository $sectionRepo)
    {
        $this->sectionRepository = $sectionRepo;
    }

    /**
     * Display a listing of the section.
     * GET|HEAD /sections
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectionRepository->pushCriteria(new RequestCriteria($request));
        $this->sectionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sections = $this->sectionRepository->all();

        return $this->sendResponse($sections->toArray(), 'Sections retrieved successfully');
    }

    /**
     * Store a newly created section in storage.
     * POST /sections
     *
     * @param CreatesectionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesectionAPIRequest $request)
    {
        $input = $request->all();

        $sections = $this->sectionRepository->create($input);

        return $this->sendResponse($sections->toArray(), 'Section saved successfully');
    }

    /**
     * Display the specified section.
     * GET|HEAD /sections/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var section $section */
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            return $this->sendError('Section not found');
        }

        return $this->sendResponse($section->toArray(), 'Section retrieved successfully');
    }

    /**
     * Update the specified section in storage.
     * PUT/PATCH /sections/{id}
     *
     * @param  int $id
     * @param UpdatesectionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var section $section */
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            return $this->sendError('Section not found');
        }

        $section = $this->sectionRepository->update($input, $id);

        return $this->sendResponse($section->toArray(), 'section updated successfully');
    }

    /**
     * Remove the specified section from storage.
     * DELETE /sections/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var section $section */
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            return $this->sendError('Section not found');
        }

        $section->delete();

        return $this->sendResponse($id, 'Section deleted successfully');
    }
}
