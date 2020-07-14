<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Enrollment\BulkDestroyEnrollment;
use App\Http\Requests\Web\Enrollment\DestroyEnrollment;
use App\Http\Requests\Web\Enrollment\IndexEnrollment;
use App\Http\Requests\Web\Enrollment\StoreEnrollment;
use App\Http\Requests\Web\Enrollment\UpdateEnrollment;
use App\Enrollment;
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

class EnrollmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEnrollment $request
     * @return array|Factory|View
     */
    public function index(IndexEnrollment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Enrollment::class, $request)->customQuery(function($q) {
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

        return view('web.enrollment.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('enrollment.create');

        return view('web.enrollment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEnrollment $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEnrollment $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Enrollment
        $enrollment = new Enrollment($sanitized);
        $enrollment->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('enrollments'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/enrollments'));
    }

    /**
     * Display the specified resource.
     *
     * @param Enrollment $enrollment
     * @throws AuthorizationException
     * @return void
     */
    public function show(Enrollment $enrollment)
    {
        $this->authorize('enrollment.show', $enrollment);


        return view('web.enrollment.show', [
        'enrollment' => $enrollment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Enrollment $enrollment
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Enrollment $enrollment)
    {
        $this->authorize('enrollment.edit', $enrollment);


        return view('web.enrollment.edit', [
            'enrollment' => $enrollment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEnrollment $request
     * @param Enrollment $enrollment
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEnrollment $request, Enrollment $enrollment)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Enrollment
        $enrollment->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('enrollments'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/enrollments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEnrollment $request
     * @param Enrollment $enrollment
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEnrollment $request, Enrollment $enrollment)
    {
        abort(403, "Deleting is not allowed at the moment");
        $enrollment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEnrollment $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEnrollment $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Enrollment::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
