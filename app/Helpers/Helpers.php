<?php

if (!function_exists('clean')) {
    function clean($dirty, $config = null)
    {
        return app('purifier')->clean($dirty, $config);
    }
}

if (!function_exists('getProjectType')) {
    function getProjectType($id)
    {
        return Cache::remember("project-type-{$id}", 3600, function () use ($id) {
            return \App\Models\ProjectTypes::find($id);
        });
    }
}

if (!function_exists('getProjectTypeName')) {
    function getProjectTypeName($projectTypesId): string
    {
        return Cache::remember("project-type-name-{$projectTypesId}", 3600, function () use ($projectTypesId) {
            return strtolower(\App\Models\ProjectTypes::find($projectTypesId)->name);
        });
    }
}



if (!function_exists('getGithubFieldValue')) {
    function getGithubFieldValue(?string $github, string $projectTypeName): string
    {
        if (empty($github)) {
            if (strpos($projectTypeName, 'logo') !== false) {
                return url(\Storage::url(request()->image));
            } else {
                return 'https://github.com/developer006tz';
            }
        } else {
            if (strpos($projectTypeName, 'logo') !== false) {
                return url(\Storage::url(request()->image));
            } else {
                return $github;
            }
        }
    }
}

if (!function_exists('getGithubFieldValueForUpdate')) {
    function getGithubFieldValueForUpdate(?string $github, string $projectTypeName, ?string $image): string
    {
        if (empty($github)) {
            if (strpos($projectTypeName, 'logo') !== false) {
                return url(\Storage::url($image));
            } else {
                return 'https://github.com/developer006tz';
            }
        } else {
            if (strpos($projectTypeName, 'logo') !== false) {
                return url(\Storage::url($image));
            } else {
                return $github;
            }
        }
    }
}


if (!function_exists('getProjectTypeImage')) {
    function getProjectTypeImage($projectTypesId): string
    {
        return Cache::remember("project-type-image-{$projectTypesId}", 3600, function () use ($projectTypesId) {
            return \App\Models\ProjectTypes::find($projectTypesId)->image;
        });
    }
}

if (!function_exists('getProjectTypeImageForUpdate')) {
    function getProjectTypeImageForUpdate($projectTypesId): string
    {
        return Cache::remember("project-type-image-{$projectTypesId}", 3600, function () use ($projectTypesId) {
            return \App\Models\ProjectTypes::find($projectTypesId)->image;
        });
    }
}

if (!function_exists('generateImageFilename')) {
    function generateImageFilename(string $title, string $username): string
    {
        $sanitizedTitle = strtolower(str_replace(' ', '-', substr($title, 0, 25)));
        $sanitizedUsername = str_replace(' ', '-', strtolower($username));
        $timestamp = time();
    
        return "{$sanitizedUsername}-{$timestamp}-{$sanitizedTitle}.jpg";
    }
}

if (!function_exists('resizeImageBasedOnProjectType')) {
    function resizeImageBasedOnProjectType($image, string $projectTypeName): void
    {
        if (strpos($projectTypeName, 'logo') !== false) {
            $image->resize(498, 460);
        } else {
            $image->resize(408, 260);
        }
    }
    
    
}

if (!function_exists('deleteProjectImage')) {
    function deleteProjectImage($projectId): void
    {
        $project = \App\Models\Projects::find($projectId);
        if ($project->image) {
            $imagePath = storage_path('app/public/' . $project->image);
    
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}

if (!function_exists('formSelect')) {
    function formSelect($name, $options, $oldValue = '', $class = '', $forListItem = false)
    {
        $selectName = $forListItem ? '__name__' : 'name';
        $selectClass = 'form-control ' . $class;
        $html = "<select class=\"$selectClass\" name=\"$selectName\">";
        $html .= "<option value=\"\">Select Project Type</option>";
        if (!empty($options)) {
            foreach ($options as $option) {
                $selected = ($oldValue == $option['id']) ? 'selected' : '';
                $html .= "<option value=\"{$option['id']}\" $selected>{$option['name']}</option>";
            }
        }
        $html .= "</select>";
        return $html;
    }
}

function select($name, $options, $selected = null)
{
    $html = '<select name="' . $name . '" id="' . $name . '" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error(' . $name . ') border-red-500 @enderror">';
    $html .= '<option value="">Select ' . ucfirst(str_replace('_', ' ', $name)) . '</option>';

    foreach ($options as $option) {
        $html .= '<option value="' . $option->id . '" ' . (($selected && $selected->id == $option->id) || old($name) == $option->id ? 'selected' : '') . '>' . $option->name . '</option>';
    }

    $html .= '</select>';
    echo $html;
}




