<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineShipment\CreateRequest;
use App\Http\Requests\VaccineShipment\UpdateRequest;
use App\Models\VaccineShipment;
use App\Models\VaccineType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

/**
 * Class VaccineShipmentController
 * @package App\Http\Controllers
 */
class VaccineShipmentController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vaccineShipments = VaccineShipment::with(['type'])->get();

        return view('admin.vaccine-shipment.list', compact('vaccineShipments'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $vaccineTypes = VaccineType::all();

        return view('admin.vaccine-shipment.create', compact('vaccineTypes'));
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $fields = $request->except(['_method', '_token']);

        $vaccineShipment = new VaccineShipment($fields);
        $vaccineShipment->save();

        return redirect()->route('vaccine-shipment.list')->with('status', __('crud.create.success'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function edit(int $id)
    {
        try {

            $model = VaccineShipment::where('id', $id)->firstOrFail();
            $vaccineTypes = VaccineType::all();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('vaccine-shipment.list')->with('status', __('crud.edit.fail'));

        }

        return view('admin.vaccine-shipment.edit', compact('model', 'vaccineTypes'));
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

            /** @var VaccineShipment $model */
            $model = VaccineShipment::where('id', $id)->firstOrFail();
            $model->fill($fields);
            $model->save();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('vaccine-shipment.list')->with('status', __('crud.edit.fail'));

        }

        return redirect()->route('vaccine-shipment.list')->with('status', __('crud.edit.success'));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        try {

            /** @var VaccineShipment $model */
            $model = VaccineShipment::where('id', $id)->firstOrFail();
            $model->delete();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('vaccine-shipment.list')->with('status', __('crud.delete.fail'));

        }

        return redirect()->route('vaccine-shipment.list')->with('status', __('crud.delete.success'));
    }
}
