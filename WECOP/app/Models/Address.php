<?php

/**
 * WECOP
 *
 * @author Shiroke-013
 * PHP version: 8.0.2
 */

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    //Attributes id, postal_code, address, country and city
    protected $fillable = ['postal_code', 'address', 'country', 'city', 'user_id'];
    
    public $timestamps = false;

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPostalCode()
    {
        return $this->attributes['postal_code'];
    }

    public function setPostalCode($postalCode)
    {
        $this->attributes['postal_code'] = $postalCode;
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }

    public function getCountry()
    {
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }
    
    public function getCity()
    {
        return $this->attributes['city'];
    }

    public function setCity($city)
    {
        $this->attributes['city'] = $city;
    }

    /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate(Request $request)
    {

        $request->validate([
            'postal_code' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);
    }
}
