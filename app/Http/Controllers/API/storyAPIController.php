<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestoryAPIRequest;
use App\Http\Requests\API\UpdatestoryAPIRequest;
use App\Models\story;
use App\Repositories\storyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class storyController
 * @package App\Http\Controllers\API
 */

class storyAPIController extends AppBaseController
{
    /** @var  storyRepository */
    private $storyRepository;

    public function __construct(storyRepository $storyRepo)
    {
        $this->storyRepository = $storyRepo;
    }

    /**
     * Display a listing of the story.
     * GET|HEAD /stories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storyRepository->pushCriteria(new RequestCriteria($request));
        $this->storyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stories = $this->storyRepository->all();

        foreach($stories as $tmp){
            $tmp->category=$tmp->category()->first();
            $tmp->sections =$tmp->sections()->get();
        }


        return $this->sendResponse($stories->toArray(), 'Stories retrieved successfully');
    }

    /**
     * Store a newly created story in storage.
     * POST /stories
     *
     * @param CreatestoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatestoryAPIRequest $request)
    {
        $input = $request->all();

        $stories = $this->storyRepository->create($input);

        return $this->sendResponse($stories->toArray(), 'Story saved successfully');
    }

    /**
     * Display the specified story.
     * GET|HEAD /stories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var story $story */
        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            return $this->sendError('Story not found');
        }

        return $this->sendResponse($story->toArray(), 'Story retrieved successfully');
    }

    /**
     * Update the specified story in storage.
     * PUT/PATCH /stories/{id}
     *
     * @param  int $id
     * @param UpdatestoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var story $story */
        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            return $this->sendError('Story not found');
        }

        $story = $this->storyRepository->update($input, $id);

        return $this->sendResponse($story->toArray(), 'story updated successfully');
    }

    /**
     * Remove the specified story from storage.
     * DELETE /stories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var story $story */
        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            return $this->sendError('Story not found');
        }

        $story->delete();

        return $this->sendResponse($id, 'Story deleted successfully');
    }
}
