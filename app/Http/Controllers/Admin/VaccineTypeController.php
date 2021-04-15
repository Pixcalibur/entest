<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineType\CreateRequest;
use App\Http\Requests\VaccineType\UpdateRequest;
use App\Models\VaccineType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

/**
 * Class VaccineTypeController
 * @package App\Http\Controllers\Admin
 */
class VaccineTypeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vaccineTypes = VaccineType::withTrashed()->get();

        return view('admin.vaccine-type.list', compact('vaccineTypes'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.vaccine-type.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $fields = $request->except(['_method', '_token']);

        $vaccineType = new VaccineType($fields);
        $vaccineType->save();

        return redirect()->route('vaccine-type.list')->with('status', __('crud.create.success'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function edit(int $id)
    {
        try {

            $model = VaccineType::where('id', $id)->firstOrFail();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('vaccine-type.list')->with('status', __('crud.edit.fail'));

        }

        return view('admin.vaccine-type.edit', compact('model'));
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

            /** @var VaccineType $model */
            $model = VaccineType::where('id', $id)->firstOrFail();
            $model->fill($fields);
            $model->save();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('vaccine-type.list')->with('status', __('crud.edit.fail'));

        }

        return redirect()->route('vaccine-type.list')->with('status', __('crud.edit.success'));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        try {

            /** @var VaccineType $model */
            $model = VaccineType::where('id', $id)->firstOrFail();
            $model->delete();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('vaccine-type.list')->with('status', __('crud.delete.fail'));

        }

        return redirect()->route('vaccine-type.list')->with('status', __('crud.delete.success'));
    }
}
