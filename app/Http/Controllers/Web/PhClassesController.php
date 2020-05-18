<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\PhClass\BulkDestroyPhClass;
use App\Http\Requests\Web\PhClass\DestroyPhClass;
use App\Http\Requests\Web\PhClass\IndexPhClass;
use App\Http\Requests\Web\PhClass\StorePhClass;
use App\Http\Requests\Web\PhClass\UpdatePhClass;
use App\PhClass;
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

class PhClassesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPhClass $request
     * @return array|Factory|View
     */
    public function index(IndexPhClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(PhClass::class, $request)->customQuery(function($q) {
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

        return view('web.ph-class.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('ph-class.create');

        return view('web.ph-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePhClass $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePhClass $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PhClass
        $phClass = new PhClass($sanitized);
        $phClass->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('ph-classes'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/ph-classes'));
    }

    /**
     * Display the specified resource.
     *
     * @param PhClass $phClass
     * @throws AuthorizationException
     * @return void
     */
    public function show(PhClass $phClass)
    {
        $this->authorize('ph-class.show', $phClass);


        return view('web.ph-class.show', [
        'phClass' => $phClass,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PhClass $phClass
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PhClass $phClass)
    {
        $this->authorize('ph-class.edit', $phClass);


        return view('web.ph-class.edit', [
            'phClass' => $phClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePhClass $request
     * @param PhClass $phClass
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePhClass $request, PhClass $phClass)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PhClass
        $phClass->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('ph-classes'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/ph-classes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPhClass $request
     * @param PhClass $phClass
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPhClass $request, PhClass $phClass)
    {
        abort(403, "Deleting is not allowed at the moment");
        $phClass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPhClass $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPhClass $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PhClass::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
