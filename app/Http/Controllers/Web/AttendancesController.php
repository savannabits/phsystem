<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Attendance\BulkDestroyAttendance;
use App\Http\Requests\Web\Attendance\DestroyAttendance;
use App\Http\Requests\Web\Attendance\IndexAttendance;
use App\Http\Requests\Web\Attendance\StoreAttendance;
use App\Http\Requests\Web\Attendance\UpdateAttendance;
use App\Attendance;
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

class AttendancesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAttendance $request
     * @return array|Factory|View
     */
    public function index(IndexAttendance $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Attendance::class, $request)->customQuery(function($q) {
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

        return view('web.attendance.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('attendance.create');

        return view('web.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttendance $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAttendance $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Attendance
        $attendance = new Attendance($sanitized);
        $attendance->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('attendances'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/attendances'));
    }

    /**
     * Display the specified resource.
     *
     * @param Attendance $attendance
     * @throws AuthorizationException
     * @return void
     */
    public function show(Attendance $attendance)
    {
        $this->authorize('attendance.show', $attendance);


        return view('web.attendance.show', [
        'attendance' => $attendance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Attendance $attendance
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Attendance $attendance)
    {
        $this->authorize('attendance.edit', $attendance);


        return view('web.attendance.edit', [
            'attendance' => $attendance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAttendance $request
     * @param Attendance $attendance
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAttendance $request, Attendance $attendance)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Attendance
        $attendance->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('attendances'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/attendances'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAttendance $request
     * @param Attendance $attendance
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAttendance $request, Attendance $attendance)
    {
        abort(403, "Deleting is not allowed at the moment");
        $attendance->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAttendance $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAttendance $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Attendance::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
