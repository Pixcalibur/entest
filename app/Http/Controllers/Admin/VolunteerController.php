<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Volunteer\CreateRequest;
use App\Http\Requests\Volunteer\UpdateRequest;
use App\Models\VaccineType;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

class VolunteerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $volunteers = Volunteer::with(['vaccine'])->get();

        return view('admin.volunteer.list', compact('volunteers'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $vaccineTypes = VaccineType::all();

        return view('admin.volunteer.create', compact('vaccineTypes'));
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $fields = $request->except(['_method', '_token']);

        $volunteer = new Volunteer($fields);
        $volunteer->save();

        return redirect()->route('volunteer.list')->with('status', __('crud.create.success'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function edit(int $id)
    {
        try {

            $model = Volunteer::where('id', $id)->firstOrFail();
            $vaccineTypes = VaccineType::all();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('volunteer.list')->with('status', __('crud.edit.fail'));

        }

        return view('admin.volunteer.edit', compact('model', 'vaccineTypes'));
    }

    /**
     * @param int $id
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(int $id, UpdateRequest $request)
    {
        try {

            $fields = $request->except(['_method', '_token']);

            /** @var Volunteer $model */
            $model = Volunteer::where('id', $id)->firstOrFail();
            $model->fill($fields);
            $model->save();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('volunteer.list')->with('status', __('crud.edit.fail'));

        }

        return redirect()->route('volunteer.list')->with('status', __('crud.edit.success'));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        try {

            /** @var Volunteer $model */
            $model = Volunteer::where('id', $id)->firstOrFail();
            $model->delete();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('volunteer.list')->with('status', __('crud.delete.fail'));

        }

        return redirect()->route('volunteer.list')->with('status', __('crud.delete.success'));
    }
}
