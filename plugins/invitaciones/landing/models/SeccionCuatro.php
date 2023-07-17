<?php namespace Invitaciones\Landing\Models;

use Model;
use October\Rain\Network\Http;

/**
 * SeccionCuatro Model
 */
class SeccionCuatro extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'invitaciones_landing_seccion_cuatros';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['*'];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'nombre_completo' => 'required',
        'email' => 'required|email|unique:invitaciones_landing_seccion_cuatros',
        'celular' => ['required','regex:/^([1-9]{1})?([1-9]{1})?([1-9]{1})?([0-9]{7})$/'],
        'numero_mesa' => 'required',
        'numero_invitados' => 'required',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [
        'cat_estatus' => ['Invitaciones\Landing\Models\Catalogos\Estatus', 'key' => 'estatus']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function listPreferenciaComida($fieldName, $value, $formData){
        return [
            '1' => 'Res (Carne)',
            '2' => 'Ave (Pollo)',
        ];
    }

    public function listPreferenciaBebida($fieldName, $value, $formData){
        return [
            '1' => 'Ron',
            '2' => 'Cerveza',
            '3' => 'Tequila',
            '4' => 'Whisky',
            '5' => 'Mezcal',
            '6' => 'Vodka',
        ];
    }

    public function listAsistencia($fieldName, $value, $formData){
        return [
            '1' => 'Si, asistiré',
            '2' => 'No asistiré',
        ];
    }

    public function listEstatus($fieldName, $value, $formData){
        /*
            - registrado
            - enviado (email | whatsapp)
            - recibido
            - leido
            - confirmado
            - expirado
        */
        return [
            '1' => 'Registrado',
            '2' => 'Enviado',
            '3' => 'Recibido',
            '4' => 'Leido',
            '5' => 'Confirmado',
            '6' => 'Expirado',
        ];
    }

    public function listMesa($fieldName, $value, $formData){
        return [
            '1' => 'Mesa #1',
            '2' => 'Mesa #2',
            '3' => 'Mesa #3',
            '4' => 'Mesa #4',
            '5' => 'Mesa #5',
            '6' => 'Mesa #6',
            '7' => 'Mesa #7',
            '8' => 'Mesa #8',
            '9' => 'Mesa #9',
            '10' => 'Mesa #10',
            '11' => 'Mesa #11',
            '12' => 'Mesa #12',
            '13' => 'Mesa #13',
            '14' => 'Mesa #14',
            '15' => 'Mesa #15',
        ];
    }
    public function afterCreate(){
        try {
            $this->token = base64_encode(\Hash::make($this->nombre_completo.$this->email.$this->celular));

            $longUrl = \Url::to('/'.'?code='.$this->token).'#asistencia';

            $result = Http::post('https://api.aws3.link/shorten', function($http) use($longUrl){
                $http->header('x-api-key', 'OfzWtHTjS5gVIAx7ixn84uQ3taQbmYjbHVlJzIj0');
                $http->header('Content-Type', 'application/json');
                $payload = [
                    'longUrl' => $longUrl
                ];
                $http->setOption(CURLOPT_POSTFIELDS, json_encode($payload));
            });

            if($result->code == 200){
                $this->response = $result->body;
                $resultado = json_decode($result->body, true);
                $this->longUrl = $longUrl;
                $this->shortUrl = $resultado['shortUrl'];
            } else {
                abort(401);
            }

            $this->estatus = 1;
            $this->save();
        } catch (\Exception $th) {
            \Log::info($th);
            abort(402);
        }
    }

    public function afterSave(){
        if(is_null($this->shortUrl)){
            try {
                $longUrl = \Url::to('/'.'?code='.$this->token).'#asistencia';
    
                $result = Http::post('https://api.aws3.link/shorten', function($http) use($longUrl){
                    $http->header('x-api-key', 'OfzWtHTjS5gVIAx7ixn84uQ3taQbmYjbHVlJzIj0');
                    $http->header('Content-Type', 'application/json');
                    $payload = [
                        'longUrl' => $longUrl
                    ];
                    $http->setOption(CURLOPT_POSTFIELDS, json_encode($payload));
                });
    
                if($result->code == 200){
                    $this->response = $result->body;
                    $resultado = json_decode($result->body, true);
                    $this->longUrl = $longUrl;
                    $this->shortUrl = $resultado['shortUrl'];
                } else {
                    abort(401);
                }
                $this->save();
            } catch (\Exception $th) {
                \Log::info($th);
                abort(402);
            }
        }
    }
}
