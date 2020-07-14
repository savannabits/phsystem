<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\GeneralResource\BulkDestroyGeneralResource;
use App\Http\Requests\Web\GeneralResource\DestroyGeneralResource;
use App\Http\Requests\Web\GeneralResource\IndexGeneralResource;
use App\Http\Requests\Web\GeneralResource\StoreGeneralResource;
use App\Http\Requests\Web\GeneralResource\UpdateGeneralResource;
use App\GeneralResource;
use Savannabits\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GeneralResourcesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGeneralResource $request
     * @return array|Factory|View
     */
    public function index(IndexGeneralResource $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(GeneralResource::class, $request)->customQuery(function($q) {
            //TODO: Insert your query modification here
        })->process();

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('web.general-resource.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('general-resource.create');

        return view('web.general-resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGeneralResource $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGeneralResource $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the GeneralResource
        $generalResource = new GeneralResource($sanitized);
        $generalResource->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('general-resources'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/general-resources'));
    }

    /**
     * Display the specified resource.
     *
     * @param GeneralResource $generalResource
     * @throws AuthorizationException
     * @return void
     */
    public function show(GeneralResource $generalResource)
    {
        $this->authorize('general-resource.show', $generalResource);


        return view('web.general-resource.show', [
        'generalResource' => $generalResource,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GeneralResource $generalResource
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(GeneralResource $generalResource)
    {
        $this->authorize('general-resource.edit', $generalResource);


        return view('web.general-resource.edit', [
            'generalResource' => $generalResource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGeneralResource $request
     * @param GeneralResource $generalResource
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGeneralResource $request, GeneralResource $generalResource)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values GeneralResource
        $generalResource->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('general-resources'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
                'object' => $generalResource
            ];
        }

        return redirect(url('/general-resources'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGeneralResource $request
     * @param GeneralResource $generalResource
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGeneralResource $request, GeneralResource $generalResource)
    {
        abort(403, "Deleting is not allowed at the moment");
        $generalResource->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGeneralResource $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGeneralResource $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    GeneralResource::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
