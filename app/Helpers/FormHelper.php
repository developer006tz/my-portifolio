<?php

namespace App\Helpers;

class FormHelper
{
    public static function selectWithDefault($name, $options, $valueField = 'id', $textField = 'name', $selectedValue = null)
    {
        $html = '<select name="' . $name . '" class="bg-gray-100 border-2 w-full p-4 rounded-lg">';

        $html .= '<option value="">Select Project Type</option>';

        foreach ($options as $option) {
            $value = $option->{$valueField};
            $text = $option->{$textField};

            $isSelected = ($selectedValue != null && $selectedValue == $value);

            $html .= '<option value="' . $value . '" ' . ($isSelected ? 'selected' : '') . '>' . $text . '</option>';
        }

        $html .= '</select>';

        return $html;
    }
}