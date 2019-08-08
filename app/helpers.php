<?php
if(!function_exists('get_user')){
function get_user($user_id)
{
$objUser = \App\User::find($user_id);
if(!$objUser) {
return abort(404);
}
return $objUser;
}
}
if(!function_exists('get_post')) {
function get_post($post_id)
{
$objPost = \App\Post::find($post_id);
if(!$objPost) {
return abort(404);
}
return $objPost;
}
}

if(!function_exists('get_clas')) {
    function get_clas($id)
    {
        $objPost = \App\Clas::find($id);
        if(!$objPost) {
            return abort(404);
        }
        return $objPost;
    }
}
if(!function_exists('get_subj')) {
    function get_subj($id)
    {
        $objPost = \App\Subject::find($id);
        if(!$objPost) {
            return abort(404);
        }
        return $objPost;
    }
}
if(!function_exists('get_teach')) {
    function get_teach($id)
    {
        $objPost = \App\User::find($id);
        if(!$objPost) {
            return abort(404);
        }
        return $objPost;
    }
}
