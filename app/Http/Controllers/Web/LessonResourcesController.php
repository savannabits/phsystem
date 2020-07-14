<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LessonResource\BulkDestroyLessonResource;
use App\Http\Requests\Web\LessonResource\DestroyLessonResource;
use App\Http\Requests\Web\LessonResource\IndexLessonResource;
use App\Http\Requests\Web\LessonResource\StoreLessonResource;
use App\Http\Requests\Web\LessonResource\UpdateLessonResource;
use App\LessonResource;
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

class LessonResourcesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLessonResource $request
     * @return array|Factory|View
     */
    public function index(IndexLessonResource $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(LessonResource::class, $request)->customQuery(function($q) {
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

        return view('web.lesson-resource.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('lesson-resource.create');

        return view('web.lesson-resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLessonResource $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLessonResource $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LessonResource
        $lessonResource = new LessonResource($sanitized);
        $lessonResource->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('lesson-resources'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/lesson-resources'));
    }

    /**
     * Display the specified resource.
     *
     * @param LessonResource $lessonResource
     * @throws AuthorizationException
     * @return void
     */
    public function show(LessonResource $lessonResource)
    {
        $this->authorize('lesson-resource.show', $lessonResource);


        return view('web.lesson-resource.show', [
        'lessonResource' => $lessonResource,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LessonResource $lessonResource
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LessonResource $lessonResource)
    {
        $this->authorize('lesson-resource.edit', $lessonResource);


        return view('web.lesson-resource.edit', [
            'lessonResource' => $lessonResource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLessonResource $request
     * @param LessonResource $lessonResource
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLessonResource $request, LessonResource $lessonResource)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LessonResource
        $lessonResource->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('lesson-resources'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
                'object' => $lessonResource
            ];
        }

        return redirect(url('/lesson-resources'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLessonResource $request
     * @param LessonResource $lessonResource
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLessonResource $request, LessonResource $lessonResource)
    {
        abort(403, "Deleting is not allowed at the moment");
        $lessonResource->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLessonResource $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLessonResource $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LessonResource::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
