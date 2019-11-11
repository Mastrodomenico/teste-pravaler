<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Repositories\InstitutionRepository;
use Illuminate\Http\Response;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('inner.institution.list', ['institutions' => InstitutionRepository::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inner.institution.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInstitutionRequest $request
     * @return Response
     */
    public function store(StoreInstitutionRequest $request)
    {
        InstitutionRepository::create(...array_values($request->only('name', 'cnpj', 'status')));
        return redirect()->route('institutions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('inner.institution.edit', ['institution' => InstitutionRepository::get($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateInstitutionRequest $request, $id)
    {
        InstitutionRepository::update($request->get('name'), $request->get('cnpj'), $request->get('status'), $id);
        return redirect()->route('institutions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        if(!InstitutionRepository::hasCourse($id)){
            InstitutionRepository::destroy($id);
            return redirect()->route('institutions.index');
        }
        $errors = new \Illuminate\Support\MessageBag();

        $errors->add('integrity', 'Essa instituição contem cursos cadastrados');
        return redirect()->route('institutions.edit', $id)->withErrors($errors);

    }
}
