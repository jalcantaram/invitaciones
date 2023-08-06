<?php namespace Invitaciones\Landing\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Mail;
use Flash;
use Backend;
use Request;
use Invitaciones\Landing\Models\SeccionCuatro as SeccionCuatroModel;
use ApplicationException;
use Illuminate\Support\Facades\Storage;

/**
 * Seccion Cuatro Back-end Controller
 */
class SeccionCuatro extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Invitaciones.Landing', 'landing', 'seccioncuatro');
    }

    // public function onSendInvitacion(){
    //     $data = post();
        
    //     $_id = (int) $data['rowid'];
        
    //     $sc = SeccionCuatroModel::findOrFail($_id);

    //     // $link = \Url::to('/'.'?code='.$sc->token);

    //     $data = [
    //         'name' => $sc->nombre_completo,
    //         'link' => $sc->shortUrl,
    //     ];
        
    //     $sc->estatus = 2;
    //     $sc->send_email = true;
    //     $sc->send_email_at = now();
    //     $sc->save();

    //     Mail::send('landing::send.invitaciones', $data, function ($message) use ($sc) {
    //         $message->to($sc->email, $sc->nombre_completo)->subject('Gris & Xavi');
    //     });
        

    //     Flash::success('Correo enviado exitosamente!');
    // }

    public function onSendWhatsAppInvitacion(){
        $data = post();
        
        $_id = (int) $data['rowid'];
        
        $sc = SeccionCuatroModel::findOrFail($_id);

        $whatsapp = 'https://api.whatsapp.com/send?phone='.$sc->celular.'&text=%C2%A1Hola%20%2A'.urlencode($sc->nombre_completo).'%2A%21%20Por%20favor%20confirma%20tu%20asistencia%20a%20la%20%C2%A1%2ABoda%2A%20de%20%2AGriss%2A%20%26%20%2AXavo%2A%21%20en%20el%20siguiente%20link%3A%20'.urlencode($sc->shortUrl);
        \Log::info($whatsapp);
        $sc->estatus = 2;
        $sc->send_whatsapp = true;
        $sc->send_whatsapp_at = now();
        $sc->save();

        Flash::success('Redireccionando!!!');

        return $whatsapp;
    }

    public function onDownload(){
        $data = SeccionCuatroModel::all();
        // \Log::info(count($data));
        if(count($data) == 0){
            throw new ApplicationException('No existen DATOS para descargar.');
        }

        $c = new SeccionCuatroModel;
        $comidas = $c->listPreferenciaComida('', '', '');
        $bebidas = $c->listPreferenciaBebida('', '', '');
        $asistencias = $c->listAsistencia('', '', '');
        $mesas = $c->listMesa('', '', '');

        $result = [];
        $count = 1;
        foreach ($data as $key => $value) {
            $result[$key]['id'] = $count++;
            $result[$key]['nombre_completo'] = $value->nombre_completo;
            $result[$key]['email'] = $value->email;
            $result[$key]['celular'] = $value->celular;
            $result[$key]['asistencia'] = isset($asistencias[$value->asistencia]) ? $asistencias[$value->asistencia] : '';
            $result[$key]['preferencia_comida'] = isset($comidas[$value->preferencia_comida]) ? $comidas[$value->preferencia_comida] : '';
            $result[$key]['preferencia_bebidas'] = isset($bebidas[$value->preferencia_bebidas]) ? $bebidas[$value->preferencia_bebidas] : '';
            $result[$key]['mesa'] = isset($mesas[$value->numero_mesa]) ? $mesas[$value->numero_mesa] : '';
            $result[$key]['mensaje'] = $value->mensaje;
            $result[$key]['shortUrl'] = $value->shortUrl;
            $result[$key]['estatus'] = $value->cat_estatus->descripcion;
        }

        $filename = 'invitaciones_reporte'.time().'.csv';

        $fiveMBs = 5* 1024 * 1024;
        $f = fopen('php://temp/maxmemory:'.$fiveMBs, 'r+');

        //set column headers
        $fields = array('ID', 'Nombre completo', 'Email', 'Telefono', 'Asistencia', 'Preferencia comida', 'Preferencia bebida', 'Mesa', 'Mensaje', 'URL', 'Estatus');
        fputcsv($f, $fields);

        foreach ($result as $d) {
            fputcsv($f, $d);
        }
        rewind($f);
        $output = stream_get_contents($f);
        $fd = Storage::disk('local')->put('media/'.$filename, $f);
        Flash::success('Reporte creado exitosamente');
        // return Response::to(Storage::url('media/'.$filename));
        return Storage::url('media/'.$filename);
    }
}
