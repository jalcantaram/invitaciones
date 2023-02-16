<?php namespace Invitaciones\Landing\Models;

use Model;

/**
 * SeccionTres Model
 */
class SeccionTres extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'invitaciones_landing_seccion_tres';

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
        'subtitulo_ceremonia' => 'required',
        'donde_ceremonia' => 'required',
        'cuando_ceremonia' => 'nullable',
        'hora_ceremonia' => 'required',
        'link_googlemaps_ceremonia' => 'required',
        'subtitulo_recepcion' => 'required',
        'donde_recepcion' => 'required',
        'cuando_recepcion' => 'nullable',
        'hora_recepcion' => 'required',
        'link_googlemaps_recepcion' => 'required',
        'text_color' => 'nullable',
        'background_color' => 'nullable',
        'fecha_celebracion' => 'required',
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
    public $attachOne = [
        'foto_novio' => 'System\Models\File',
        'foto_novia' => 'System\Models\File',
        'imagen_ceremonia' => 'System\Models\File',
        'imagen_recepcion' => 'System\Models\File',
    ];
    public $attachMany = [];
}
