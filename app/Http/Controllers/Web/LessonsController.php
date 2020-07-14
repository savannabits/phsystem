<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Lesson\BulkDestroyLesson;
use App\Http\Requests\Web\Lesson\DestroyLesson;
use App\Http\Requests\Web\Lesson\IndexLesson;
use App\Http\Requests\Web\Lesson\StoreLesson;
use App\Http\Requests\Web\Lesson\UpdateLesson;
use App\Lesson;
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

class LessonsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLesson $request
     * @return array|Factory|View
     */
    public function index(IndexLesson $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Lesson::class, $request)->customQuery(function($q) {
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

        return view('web.lesson.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('lesson.create');

        return view('web.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLesson $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLesson $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Lesson
        $lesson = new Lesson($sanitized);
        $lesson->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('lessons'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/lessons'));
    }

    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson
     * @throws AuthorizationException
     * @return void
     */
    public function show(Lesson $lesson)
    {
        $this->authorize('lesson.show', $lesson);


        return view('web.lesson.show', [
        'lesson' => $lesson,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lesson $lesson
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Lesson $lesson)
    {
        $this->authorize('lesson.edit', $lesson);


        return view('web.lesson.edit', [
            'lesson' => $lesson,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLesson $request
     * @param Lesson $lesson
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLesson $request, Lesson $lesson)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Lesson
        $lesson->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('lessons'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/lessons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLesson $request
     * @param Lesson $lesson
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLesson $request, Lesson $lesson)
    {
        abort(403, "Deleting is not allowed at the moment");
        $lesson->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLesson $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLesson $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Lesson::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
