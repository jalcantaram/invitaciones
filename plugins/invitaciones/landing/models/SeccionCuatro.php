<?php namespace Invitaciones\Landing\Models;

use Model;

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
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function listPreferenciaComida($fieldName, $value, $formData){
        return [
            '' => 'Selecciona una opción',
            '1' => 'Res (Carne)',
            '2' => 'Ave (Pollo)',
        ];
    }

    public function listAsistencia($fieldName, $value, $formData){
        return [
            '' => 'Selecciona una opción',
            '1' => 'Si',
            '2' => 'No',
        ];
    }

    public function listEstatus($fieldName, $value, $formData){
        return [
            '1' => 'Enviado',
            '2' => 'Confirmado',
            '3' => 'Expirado',
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
        $this->token = base64_encode(\Hash::make($this->nombre_completo.$this->email.$this->celular));
        $this->save();
    }
}
