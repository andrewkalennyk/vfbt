<?php

namespace Laravel\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Http\Requests\RestoreResourceRequest;
use Laravel\Nova\Nova;

class ResourceRestoreController extends Controller
{
    /**
     * Restore the given resource(s).
     *
     * @param  \Laravel\Nova\Http\Requests\RestoreResourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function handle(RestoreResourceRequest $request)
    {
        $request->chunks(150, function ($models) use ($request) {
            $models->each(function ($model) use ($request) {
                $model->restore();

                DB::table('action_events')->insert(
                    Nova::actionEvent()->forResourceRestore($request->user(), collect([$model]))
                                ->map->getAttributes()->all()
                );
            });
        });
    }
}
