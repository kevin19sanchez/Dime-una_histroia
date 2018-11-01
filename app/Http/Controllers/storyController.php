<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestoryRequest;
use App\Http\Requests\UpdatestoryRequest;
use App\Repositories\storyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\category;
use App\Models\story;
use View;

class storyController extends AppBaseController
{
    /** @var  storyRepository */
    private $storyRepository;

    public function __construct(storyRepository $storyRepo)
    {
        $this->storyRepository = $storyRepo;
    }

    /**
     * Display a listing of the story.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storyRepository->pushCriteria(new RequestCriteria($request));
        $stories = $this->storyRepository->all();

        
        foreach($stories as $tmp){
            $tmp->category=$tmp->category()->first();
            $tmp->sections =$tmp->sections()->get();
        }


        return view('stories.index')->with('stories', $stories);
    }

    /**
     * Show the form for creating a new story.
     *
     * @return Response
     */
    public function create()
    {
        $categories = category::pluck('name','id');
        
        //return view('stories.create',compact('categories'));
        return View::make('stories.create')->with(compact('categories'));
    }

    /**
     * Store a newly created story in storage.
     *
     * @param CreatestoryRequest $request
     *
     * @return Response
     */
    public function store(CreatestoryRequest $request)
    {
        $input = $request->all();
     //   return json_encode($input);

        $story = $this->storyRepository->create($input);

        Flash::success('Story saved successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Display the specified story.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        return view('stories.show')->with('story', $story);
    }

    /**
     * Show the form for editing the specified story.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = category::pluck('name','id');
      
    ///    return View::make('stories.create')->with(compact('categories'));



        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        return view('stories.edit')->with(compact('story','categories'));
    }

    /**
     * Update the specified story in storage.
     *
     * @param  int              $id
     * @param UpdatestoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestoryRequest $request)
    {
        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        $story = $this->storyRepository->update($request->all(), $id);

        Flash::success('Story updated successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Remove the specified story from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $story = $this->storyRepository->findWithoutFail($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        $this->storyRepository->delete($id);

        Flash::success('Story deleted successfully.');

        return redirect(route('stories.index'));
    }
}
