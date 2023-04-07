<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionCuatro as SeccionCuatroModel;
use Validator;
use Flash;
use October\Rain\Exception\ValidationException;

class SeccionCuatro extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionCuatro Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $seccioncuatro = SeccionCuatroModel::first();
        return $seccioncuatro;
    }

    public function onSave(){
        \Log::info(post());
        $data = post();
        $rules = [
            'asistencia' => 'required',
            'proteina' => 'required',
            'bebida' => 'required',
            'mensaje' => 'required',
        ];  
        $messages = [
            '*.required' => 'Campo obligatorio',
        ];
        $validation = Validator::make($data, $rules, $messages);
        if ($validation->fails()) {
            throw new ValidationException($validation);
        }
        // TERMINAR GUARDADO
        Flash::success('Jobs done!');
    }
}
