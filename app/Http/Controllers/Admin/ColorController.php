<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ColorDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateColorRequest;
use App\Http\Requests\Admin\UpdateColorRequest;
use App\Repositories\Admin\ColorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ColorController extends AppBaseController
{
    /** @var  ColorRepository */
    private $colorRepository;

    public function __construct(ColorRepository $colorRepo)
    {
        $this->colorRepository = $colorRepo;
    }

    /**
     * Display a listing of the Color.
     *
     * @param ColorDataTable $colorDataTable
     * @return Response
     */
    public function index(ColorDataTable $colorDataTable)
    {
        return $colorDataTable->render('admin.colors.index');
    }

    /**
     * Show the form for creating a new Color.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created Color in storage.
     *
     * @param CreateColorRequest $request
     *
     * @return Response
     */
    public function store(CreateColorRequest $request)
    {
        $input = $request->all();

        $color = $this->colorRepository->create($input);

        Flash::success('Color saved successfully.');

        return redirect(route('admin.colors.index'));
    }

    /**
     * Display the specified Color.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('Color not found');

            return redirect(route('admin.colors.index'));
        }

        return view('admin.colors.show')->with('color', $color);
    }

    /**
     * Show the form for editing the specified Color.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('Color not found');

            return redirect(route('admin.colors.index'));
        }

        return view('admin.colors.edit')->with('color', $color);
    }

    /**
     * Update the specified Color in storage.
     *
     * @param  int              $id
     * @param UpdateColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorRequest $request)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('Color not found');

            return redirect(route('admin.colors.index'));
        }

        $color = $this->colorRepository->update($request->all(), $id);

        Flash::success('Color updated successfully.');

        return redirect(route('admin.colors.index'));
    }

    /**
     * Remove the specified Color from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('Color not found');

            return redirect(route('admin.colors.index'));
        }

        $this->colorRepository->delete($id);

        Flash::success('Color deleted successfully.');

        return redirect(route('admin.colors.index'));
    }
}
