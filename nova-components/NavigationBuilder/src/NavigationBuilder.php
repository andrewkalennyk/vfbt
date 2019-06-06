<?php

namespace Annyk\NavigationBuilder;

use App\Models\NavigationMenuItem;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NavigationBuilder extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('navigation-builder', __DIR__.'/../dist/js/tool.js');
        Nova::style('navigation-builder', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        $allResources = NavigationMenuItem::all();

        $resources = self::availableResources(request(), $allResources->pluck('resource')->toArray());
        $resources = self::prepareImages($resources, $allResources);
        return view('navigation-builder::navigation', compact('resources'));
    }

    public static function availableResources(Request $request, $resources)
    {
        return collect($resources)->filter(function ($resource) use ($request) {
            return $resource::authorizedToViewAny($request) &&
                $resource::availableForNavigation($request);
        })->all();
    }

    public static function prepareImages($resources, $allResources)
    {
        return collect($resources)->map(function ($resource) use ($allResources) {
            $image = $allResources->where('resource',$resource)->first()->image;
            return [
                'resource' => $resource,
                'image'     => $image ?? null
            ];
        })->all();
    }
}
