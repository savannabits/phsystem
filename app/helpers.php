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
