<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RelationshipType\BulkDestroyRelationshipType;
use App\Http\Requests\Web\RelationshipType\DestroyRelationshipType;
use App\Http\Requests\Web\RelationshipType\IndexRelationshipType;
use App\Http\Requests\Web\RelationshipType\StoreRelationshipType;
use App\Http\Requests\Web\RelationshipType\UpdateRelationshipType;
use App\RelationshipType;
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

class RelationshipTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRelationshipType $request
     * @return array|Factory|View
     */
    public function index(IndexRelationshipType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(RelationshipType::class, $request)->customQuery(function($q) {
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

        return view('web.relationship-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('relationship-type.create');

        return view('web.relationship-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRelationshipType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRelationshipType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RelationshipType
        $relationshipType = new RelationshipType($sanitized);
        $relationshipType->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('relationship-types'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/relationship-types'));
    }

    /**
     * Display the specified resource.
     *
     * @param RelationshipType $relationshipType
     * @throws AuthorizationException
     * @return void
     */
    public function show(RelationshipType $relationshipType)
    {
        $this->authorize('relationship-type.show', $relationshipType);


        return view('web.relationship-type.show', [
        'relationshipType' => $relationshipType,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RelationshipType $relationshipType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RelationshipType $relationshipType)
    {
        $this->authorize('relationship-type.edit', $relationshipType);


        return view('web.relationship-type.edit', [
            'relationshipType' => $relationshipType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRelationshipType $request
     * @param RelationshipType $relationshipType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRelationshipType $request, RelationshipType $relationshipType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RelationshipType
        $relationshipType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('relationship-types'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/relationship-types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRelationshipType $request
     * @param RelationshipType $relationshipType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRelationshipType $request, RelationshipType $relationshipType)
    {
        abort(403, "Deleting is not allowed at the moment");
        $relationshipType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRelationshipType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRelationshipType $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RelationshipType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
