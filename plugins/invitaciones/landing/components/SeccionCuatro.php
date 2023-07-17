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
        $data = post();
        $rules = [
            'asistencia' => 'required',
            'numero_invitados' => 'nullable',
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

        $c = new SeccionCuatroModel;
        // $comidas = $c->listPreferenciaComida('', '', '');
        $bebidas = $c->listPreferenciaBebida('', '', '');
        $asistencias = $c->listAsistencia('', '', '');

        $sc = SeccionCuatroModel::where('token', $data['code'])->first();
        // $sc->preferencia_comida = $data['proteina'];
        $sc->asistencia  = $data['asistencia'];
        $sc->preferencia_bebidas = $data['bebida'];
        $sc->mensaje = $data['mensaje'];
        $sc->estatus = 5;
        $sc->active = false;
        $sc->save();
        \Log::info($sc);
        Flash::success('Confirmación enviada exitosamente!');
        return [
            '#confirmacionPartial' => $this->renderPartial('@_success', [
                'data' => $sc,
                // 'comidas' => $comidas,
                'bebidas' => $bebidas,
                'asistencias' => $asistencias
            ])
        ];
    }
}
