<?php

namespace App\Enums;

enum SettingType: string
{
    case TEXT = 'text';
    case TEXTAREA = 'textarea';
    case IMAGE = 'image';
    case COLOR = 'color';
    case SELECT = 'select';
    case NUMBER = 'number';
    case EMAIL = 'email';
    case BOOLEAN = 'boolean';
    case URL = 'url'; // Added URL type

    public function label(): string
    {
        return match ($this) {
            self::TEXT => 'Single Line Text',
            self::TEXTAREA => 'Long Text (Textarea)',
            self::IMAGE => 'Image / File Upload',
            self::COLOR => 'Color Picker',
            self::SELECT => 'Dropdown (Select)',
            self::NUMBER => 'Number Input',
            self::EMAIL => 'Email Address',
            self::BOOLEAN => 'Switch / Checkbox',
            self::URL => 'Website Link (URL)', // Label
        };
    }
}
