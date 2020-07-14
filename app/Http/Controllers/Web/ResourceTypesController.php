<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ResourceType\BulkDestroyResourceType;
use App\Http\Requests\Web\ResourceType\DestroyResourceType;
use App\Http\Requests\Web\ResourceType\IndexResourceType;
use App\Http\Requests\Web\ResourceType\StoreResourceType;
use App\Http\Requests\Web\ResourceType\UpdateResourceType;
use App\ResourceType;
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

class ResourceTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexResourceType $request
     * @return array|Factory|View
     */
    public function index(IndexResourceType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(ResourceType::class, $request)->customQuery(function($q) {
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

        return view('web.resource-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('resource-type.create');

        return view('web.resource-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreResourceType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreResourceType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ResourceType
        $resourceType = new ResourceType($sanitized);
        $resourceType->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('resource-types'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/resource-types'));
    }

    /**
     * Display the specified resource.
     *
     * @param ResourceType $resourceType
     * @throws AuthorizationException
     * @return void
     */
    public function show(ResourceType $resourceType)
    {
        $this->authorize('resource-type.show', $resourceType);


        return view('web.resource-type.show', [
        'resourceType' => $resourceType,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ResourceType $resourceType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ResourceType $resourceType)
    {
        $this->authorize('resource-type.edit', $resourceType);


        return view('web.resource-type.edit', [
            'resourceType' => $resourceType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateResourceType $request
     * @param ResourceType $resourceType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateResourceType $request, ResourceType $resourceType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ResourceType
        $resourceType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('resource-types'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/resource-types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyResourceType $request
     * @param ResourceType $resourceType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyResourceType $request, ResourceType $resourceType)
    {
        abort(403, "Deleting is not allowed at the moment");
        $resourceType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyResourceType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyResourceType $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ResourceType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
