<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Relative\BulkDestroyRelative;
use App\Http\Requests\Web\Relative\DestroyRelative;
use App\Http\Requests\Web\Relative\IndexRelative;
use App\Http\Requests\Web\Relative\StoreRelative;
use App\Http\Requests\Web\Relative\UpdateRelative;
use App\Relative;
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

class RelativesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRelative $request
     * @return array|Factory|View
     */
    public function index(IndexRelative $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Relative::class, $request)->customQuery(function($q) {
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

        return view('web.relative.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('relative.create');

        return view('web.relative.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRelative $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRelative $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Relative
        $relative = new Relative($sanitized);
        $relative->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('relatives'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/relatives'));
    }

    /**
     * Display the specified resource.
     *
     * @param Relative $relative
     * @throws AuthorizationException
     * @return void
     */
    public function show(Relative $relative)
    {
        $this->authorize('relative.show', $relative);


        return view('web.relative.show', [
        'relative' => $relative,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Relative $relative
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Relative $relative)
    {
        $this->authorize('relative.edit', $relative);


        return view('web.relative.edit', [
            'relative' => $relative,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRelative $request
     * @param Relative $relative
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRelative $request, Relative $relative)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Relative
        $relative->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('relatives'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/relatives'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRelative $request
     * @param Relative $relative
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRelative $request, Relative $relative)
    {
        abort(403, "Deleting is not allowed at the moment");
        $relative->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRelative $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRelative $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Relative::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
