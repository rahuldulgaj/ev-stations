<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ChargingStations extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name','status','code', 'ownername','company_id' ,'latitude' ,'longitude','lat_lang','mobile', 'time_slot_id','automated_status_id',
        'country_id','state_id','city_id','image','numbers_of_ports'
    ];
    public function amenities()
    {
        return $this->belongsToMany(Amenities::class)->withTimestamps();
    }
    public function connector()
    {
       // return $this->belongsToMany(ConnectorType::class)->withTimestamps();
       // return $this->belongsToMany(ConnectorType::class, 'charging_stations_connector_type')
      //  ->withPivot('column1', 'column2')->withTimestamps();
      return $this->belongsToMany(ConnectorType::class)->withPivot(['price','kwatt','amps','network_id','rate_id'])->withTimestamps();
    }


}
