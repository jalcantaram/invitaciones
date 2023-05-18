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
        'fecha_celebracion' => 'required',
        'subtitulo_coctel' => 'required',
        'donde_coctel' => 'required',
        'hora_coctel' => 'required',
        'link_googlemaps_coctel' => 'required',
        'foto_lugar_coctel' => 'required',
        'subtitulo_ceremonia' => 'required',
        'donde_ceremonia' => 'required',
        'hora_ceremonia' => 'required',
        'link_googlemaps_ceremonia' => 'required',
        'foto_lugar_ceremonia' => 'required',
        'subtitulo_cena' => 'required',
        'donde_cena' => 'required',
        'hora_cena' => 'required',
        'link_googlemaps_cena' => 'required',
        'foto_lugar_cena' => 'required',
        
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
        'foto_lugar_coctel' => 'System\Models\File',
        'foto_lugar_ceremonia' => 'System\Models\File',
        'foto_lugar_cena' => 'System\Models\File',
    ];
    public $attachMany = [];
}
