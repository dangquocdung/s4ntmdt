<?php

namespace Botble\Backup\Http\Requests;

use Botble\Support\Http\Requests\Request;

class CreateBackupRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Dung Dang
     */
    public function rules()
    {
        return [
            'name' => 'required|max:250',
            'description' => 'required|max:250',
        ];
    }
}
