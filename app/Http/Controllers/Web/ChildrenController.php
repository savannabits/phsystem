<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Child\BulkDestroyChild;
use App\Http\Requests\Web\Child\DestroyChild;
use App\Http\Requests\Web\Child\IndexChild;
use App\Http\Requests\Web\Child\StoreChild;
use App\Http\Requests\Web\Child\UpdateChild;
use App\Child;
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

class ChildrenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexChild $request
     * @return array|Factory|View
     */
    public function index(IndexChild $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Child::class, $request)->customQuery(function($q) {
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

        return view('web.child.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('child.create');

        return view('web.child.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChild $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreChild $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Child
        $child = new Child($sanitized);
        $child->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('children'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/children'));
    }

    /**
     * Display the specified resource.
     *
     * @param Child $child
     * @throws AuthorizationException
     * @return void
     */
    public function show(Child $child)
    {
        $this->authorize('child.show', $child);


        return view('web.child.show', [
        'child' => $child,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Child $child
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Child $child)
    {
        $this->authorize('child.edit', $child);


        return view('web.child.edit', [
            'child' => $child,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateChild $request
     * @param Child $child
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateChild $request, Child $child)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        // Update changed values Child
        $child->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('children'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/children'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyChild $request
     * @param Child $child
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyChild $request, Child $child)
    {
        abort(403, "Deleting is not allowed at the moment");
        $child->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyChild $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyChild $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Child::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
