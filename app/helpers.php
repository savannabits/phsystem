<?php
function jsonRes($success, $message, $payload=[], $code=200, $additional=[]) {
    if ($success === false && $code === 200) {
        $code = 400;
    }
    $res = array_merge(['success' => $success, "message" => $message, "payload" => $payload],$additional);
    return response()->json($res,$code);
}

/*function settings($key) {
    $setting = \App\Setting::where("key", "=", $key)->first();
    if (!$setting) {
        return null;
    }
    return $setting->val;
}*/


function perm($name, $guard=null) {
    $perm = \App\Permission::whereName($name);
    if ($guard) {
        $perm->whereGuardName($guard);
    }
    return $perm->first();
}

/**
 * @param array $breadcrumbs
 * @return string
 */
function makeBreadCrumbs(array $breadcrumbs) {
    $html = '
<nav aria-label="breadcrumb">
    <ol class="breadcrumb foi-breadcrumb">';
    foreach ($breadcrumbs as $breadcrumb) {
        $html.="<li class=\"breadcrumb-item ".(collect($breadcrumb)->get("active") ? 'active' : '')."\">
            ".
            (!collect($breadcrumb)->get('active') ? "<a href=\"".collect($breadcrumb)->get('url')."\">".collect($breadcrumb)->get('title')."</a>" :collect($breadcrumb)->get('title'))
            ."
        </li>";
    }
    $html.='
    </ol>
</nav>';
    return $html;
}

/**
 * @return \App\Child[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
 */
function myChildren() {
    if (!Auth::check()) {
        return collect([]);
    }
    if (!Auth::user()->hasRole('Parent')) return collect([]);
    $children = \App\Child::whereHas("relatives",function ($q) {
        $q->where("user_id", "=", Auth::id());
    })->whereActive(true)->with(['enrollments.phClass'])->get();
    return $children;
}
function phClasses() {
    if (!Auth::check()) {
        return collect([]);
    }
    if (!Auth::user()->can('ph-class.index')) {
        return collect([]);
    }
    $classes = \App\PhClass::whereEnabled(true)->with(["children"])->orderBy('minimum_age')->get();
    return $classes;
}
