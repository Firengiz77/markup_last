<?php
namespace App\Http\Controllers;


use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Models\Team;
use App\Repositories\TeamRepository;

class TeamController extends Controller
{


    private TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $teams    = Team::all();

        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('team.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->teamRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Team  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $team = Team::findorFail($id);
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $team=Team::findorFail($id);
        if($request->validated())
        {
             $result =  $this->teamRepository->update($request, $team);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Team Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $team = Team::findorFail($id);
        $result =  $this->teamRepository->destroy($team);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Team Successfully Delete!') );
    }

}
