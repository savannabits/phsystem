<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RollCall\BulkDestroyRollCall;
use App\Http\Requests\Web\RollCall\DestroyRollCall;
use App\Http\Requests\Web\RollCall\IndexRollCall;
use App\Http\Requests\Web\RollCall\StoreRollCall;
use App\Http\Requests\Web\RollCall\UpdateRollCall;
use App\RollCall;
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

class RollCallsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRollCall $request
     * @return array|Factory|View
     */
    public function index(IndexRollCall $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(RollCall::class, $request)->customQuery(function($q) {
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

        return view('web.roll-call.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('roll-call.create');

        return view('web.roll-call.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRollCall $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRollCall $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RollCall
        $rollCall = new RollCall($sanitized);
        $rollCall->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('roll-calls'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/roll-calls'));
    }

    /**
     * Display the specified resource.
     *
     * @param RollCall $rollCall
     * @throws AuthorizationException
     * @return void
     */
    public function show(RollCall $rollCall)
    {
        $this->authorize('roll-call.show', $rollCall);


        return view('web.roll-call.show', [
        'rollCall' => $rollCall,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RollCall $rollCall
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RollCall $rollCall)
    {
        $this->authorize('roll-call.edit', $rollCall);


        return view('web.roll-call.edit', [
            'rollCall' => $rollCall,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRollCall $request
     * @param RollCall $rollCall
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRollCall $request, RollCall $rollCall)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RollCall
        $rollCall->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('roll-calls'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/roll-calls'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRollCall $request
     * @param RollCall $rollCall
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRollCall $request, RollCall $rollCall)
    {
        abort(403, "Deleting is not allowed at the moment");
        $rollCall->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRollCall $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRollCall $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RollCall::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
