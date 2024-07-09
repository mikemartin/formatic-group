<?php

namespace App\Fieldtypes;

use Statamic\Fieldtypes\ButtonGroup;
use Statamic\Fieldtypes\HasSelectOptions;

class YesNo extends ButtonGroup
{ 
    use HasSelectOptions;

    protected $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-0.75 -0.75 24 24"><path fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" d="M.469 11.25a10.781 10.781 0 1 0 21.562 0 10.781 10.781 0 1 0-21.562 0M3.627 18.873 18.873 3.627"/></svg>';
    public static $title = "Yes/No";
    protected $selectableInForms = true;

    protected function configFieldItems(): array
    {
      return [
        [
            'display' => __('Options'),
            'fields' => [
                'options' => [
                    'display' => __('Options'),
                    'instructions' => __('statamic::fieldtypes.radio.config.options'),
                    'type' => 'array',
                    'value_header' => __('Label').' ('.__('Optional').')',
                    'add_button' => __('Add Option'),
                    'default' => [
                      'yes' => 'Yes',
                      'no' => 'No',
                    ],
                    'validate' => [function ($attribute, $value, $fail) {
                        $optionsWithoutKeys = collect($value)->keys()->filter(fn ($key) => empty($key) || $key === 'null');

                        if ($optionsWithoutKeys->isNotEmpty()) {
                            $fail(__('statamic::validation.options_require_keys'));
                        }
                    }],
                ],
                'default' => [
                    'display' => __('Default Value'),
                    'instructions' => __('statamic::messages.fields_default_instructions'),
                    'type' => 'text',
                ],
            ],
        ],
      ];

    }
}
