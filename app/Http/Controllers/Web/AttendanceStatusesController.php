<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AttendanceStatus\BulkDestroyAttendanceStatus;
use App\Http\Requests\Web\AttendanceStatus\DestroyAttendanceStatus;
use App\Http\Requests\Web\AttendanceStatus\IndexAttendanceStatus;
use App\Http\Requests\Web\AttendanceStatus\StoreAttendanceStatus;
use App\Http\Requests\Web\AttendanceStatus\UpdateAttendanceStatus;
use App\AttendanceStatus;
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

class AttendanceStatusesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAttendanceStatus $request
     * @return array|Factory|View
     */
    public function index(IndexAttendanceStatus $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(AttendanceStatus::class, $request)->customQuery(function($q) {
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

        return view('web.attendance-status.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('attendance-status.create');

        return view('web.attendance-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttendanceStatus $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAttendanceStatus $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AttendanceStatus
        $attendanceStatus = new AttendanceStatus($sanitized);
        $attendanceStatus->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('attendance-statuses'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/attendance-statuses'));
    }

    /**
     * Display the specified resource.
     *
     * @param AttendanceStatus $attendanceStatus
     * @throws AuthorizationException
     * @return void
     */
    public function show(AttendanceStatus $attendanceStatus)
    {
        $this->authorize('attendance-status.show', $attendanceStatus);


        return view('web.attendance-status.show', [
        'attendanceStatus' => $attendanceStatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AttendanceStatus $attendanceStatus
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AttendanceStatus $attendanceStatus)
    {
        $this->authorize('attendance-status.edit', $attendanceStatus);


        return view('web.attendance-status.edit', [
            'attendanceStatus' => $attendanceStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAttendanceStatus $request
     * @param AttendanceStatus $attendanceStatus
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAttendanceStatus $request, AttendanceStatus $attendanceStatus)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AttendanceStatus
        $attendanceStatus->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('attendance-statuses'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/attendance-statuses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAttendanceStatus $request
     * @param AttendanceStatus $attendanceStatus
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAttendanceStatus $request, AttendanceStatus $attendanceStatus)
    {
        abort(403, "Deleting is not allowed at the moment");
        $attendanceStatus->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAttendanceStatus $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAttendanceStatus $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AttendanceStatus::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
