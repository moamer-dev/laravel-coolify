<?php

use App\Models\User;
use App\Models\LearningPath;
use Illuminate\Support\Facades\Auth;

//use App\Models\User;
//this file is autoloaded by composer.json
//you can use the included functions in any file in your project
//it can be loaded with using composer dump-autoload


/**
 * Get records from the database using Eloquent.
 *
 * @param  string  $modelClassName  The Eloquent model class name.
 * @param  array   $conditions      An associative array of conditions.
 * @param  array   $orderBy         An associative array for ordering (optional).
 * @param  int     $limit           The maximum number of records to retrieve (optional).
 * @return \Illuminate\Database\Eloquent\Collection
 */
function getFormattedPriceBack($course)
{
    if ($course->price_type === 'free') {
        return 'Free';
    }
    if ($course->price_type === 'paid') {
        if ($course->discount_type === 'fixed_amount') {
            return $course->currency->symbol . number_format($course->price - $course->discount_price, 2);
        } else if ($course->discount_type === 'percentage') {
            return $course->currency->symbol . number_format($course->price - ($course->price * $course->discount_percentage / 100), 2);
        } else {
            return $course->currency->symbol . number_format($course->price, 2);
        }
    }
}

function getFormattedPriceFront($course)
{
    if ($course->price_type === 'free') {
        return '<span class="fw-semibold text-success">Free</span>';
    }

    if ($course->price_type === 'paid') {
        $symbol = $course->currency->symbol;

        if ($course->discount_type === 'fixed_amount') {
            $discountedPrice = $course->price - $course->discount_price;
            return '<span class="fw-semibold text-success"><s class="text-danger">' . $symbol . number_format($course->price, 2) . '</s> ' . $symbol . number_format($discountedPrice, 2) . '</span>';
        } elseif ($course->discount_type === 'percentage') {
            $discountedPrice = $course->price - ($course->price * $course->discount_percentage / 100);
            return '<span class="fw-semibold text-success"><s class="text-danger">' . $symbol . number_format($course->price, 2) . '</s> ' . $symbol . number_format($discountedPrice, 2) . '</span>';
        } else {
            return '<span class="fw-semibold">' . $symbol . number_format($course->price, 2) . '</span>';
        }
    }
}

function getYouTubeVideoId($url)
{
    // Extract video ID from various YouTube URL formats
    $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    preg_match($pattern, $url, $matches);

    return $matches[1] ?? null;
}

function getPathTechnologies($path_slug)
{
    $path = LearningPath::with(['learningStacks.technologyStacks'])->where('slug', $path_slug)->first();
    return $path->learningStacks->map(function ($stack) {
        return $stack->technologyStacks;
    })->flatten();
}

function formattedDate($date)
{
    return date('d M, Y', strtotime($date));
}

function show_($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function get_auth($meta)
{
    return Auth::user()->$meta;
}

function get_user_by_role($role = null)
{
    if ($role === 'admin') {
        return 'Administrator';
    } else if ($role === 'instructor') {
        return 'Instructor';
    } else if ($role === 'user') {
        return 'User';
    }
}

function photo_or_default($photo = null)
{
    if ($photo) {
        return asset('/storage/' . $photo);
    } else {
        return asset('assets/media/svg/avatars/blank.svg');
    }
}

function get_user_name($id = null)
{
    $user = User::find($id);
    return $user->name;
}

function get_avatar_by_id($id = null)
{
    $user = User::find($id);
    //dd($user->profile->avatar);
    if ($user->profile?->avatar) {
        return asset('/storage/' . $user->profile?->avatar);
    } else {
        return asset('assets/media/svg/avatars/blank.svg');
    }
}

function feature_image_or_default($photo = null)
{
    if ($photo) {
        return asset('/storage/' . $photo);
    } else {
        return asset('assets/media/demo/1600x1200/2.jpg');
    }
}

function status_name($status = null)
{
    switch ($status) {
        case '1':
            return 'Active';
        case '0':
            return 'Inactive';
        case '2':
            return 'Pending';
    }
}

function language_name($code)
{
    switch ($code) {
        case 'en':
            return 'English';
        case 'ar':
            return 'Arabic';
        case 'fr':
            return 'French';
        case 'es':
            return 'Spanish';
        case 'de':
            return 'German';
    }
}

function get_all($model = null)
{
    $data = $model::all();
    return  $data;
}

function is_admin($id = null)
{
    $user = get_first_by_id(User::class, $id);
    if ($user->role == 'admin') {
        return true;
    } else {
        return false;
    }
    //return $user->role == 'admin';
}

function is_course_author($id = null)
{
    if (Auth::user()->id == $id) {
        return true;
    } else {
        return false;
    }
}

function render_image($image)
{
    return asset('/' . $image);
}
function get_first_by_id($model = null, $id = null)
{
    $data = $model::find($id);
    return  $data;
}

function get_user_role($id = null)
{
    $user = get_first_by_id(User::class, $id);
    return $user->role;
}

function get_user_status($id = null)
{
    $user = get_first_by_id(User::class, $id);
    return $user->status;
}


function get_cols($model = null, $columns = array())
{
    $data = $model::select($columns)->get();
    return  $data;
}
function get_cols_where_count($model = null, $columns = array(), $where = array())
{
    $data = $model::select($columns)->where($where)->count();
    return  $data;
}
function get_cols_by_id($model = null, $columns = array(), $id = null)
{
    $data = $model::select($columns)->find($id);
    return  $data;
}

function get_cols_where_orderby($model = null, $columns = array(), $where = array(), $orderbyfiled = 'id', $orderbytype = 'ASC')
{
    $data = $model::select($columns)->where($where)->orderby($orderbyfiled, $orderbytype)->get();
    return  $data;
}
function get_cols_where_orderby_limit($model = null, $columns = array(), $where = array(), $orderbyfiled = 'id', $orderbytype = 'ASC', $limit = 5)
{
    $data = $model::select($columns)->where($where)->orderby($orderbyfiled, $orderbytype)->limit($limit)->get();
    return  $data;
}
function get_cols_where_orderby_limit_Deleted($model = null, $columns = array(), $where = array(), $orderbyfiled = 'id', $orderbytype = 'ASC', $limit = 5)
{
    $data = $model::onlyTrashed($columns)->where($where)->orderby($orderbyfiled, $orderbytype)->limit($limit)->get();
    return  $data;
}
function get_cols_where_orderby_Deleted($model = null, $columns = array(), $where = array(), $orderbyfiled = 'id', $orderbytype = 'ASC')
{
    $data = $model::onlyTrashed($columns)->where($where)->orderby($orderbyfiled, $orderbytype)->get();
    return  $data;
}
function insert($model = null, $dataToinsert = array())
{
    $flag = $model::create($dataToinsert);
    return  $flag;
}
function update($model = null, $dataToupdate = array(), $where = array())
{
    $flag = $model::where($where)->update($dataToupdate);
    return  $flag;
}
function get_cols_where_row($model = null, $columns = array(), $where = array())
{
    $datarow = $model::select($columns)->where($where)->first();
    return $datarow;
}
function delete($model = null, $where = array())
{
    $flag = $model::where($where)->delete();
    return $flag;
}
function upload($folderStoringPath, $image)
{
    $extension = strtolower($image->extension());
    $filename = time() . rand(1, 10000) . "." . $extension;
    $image->move("uploads", $filename);
    return $filename;
}

function upload_file($folderStoringPath, $file)
{
    $extension = strtolower($file->extension());
    $filename = time() . rand(1, 10000) . "." . $extension;
    $file->move("uploads", $filename);
    return $filename;
}
