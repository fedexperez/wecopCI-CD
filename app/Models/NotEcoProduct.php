<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP version: 8.0.2
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class NotEcoProduct
 * @package App/Models
 */
class NotEcoProduct extends Model
{
    use HasFactory;

    //Attributes id, name, emision, productLife
    protected $fillable = ['name', 'emision', 'price', 'product_life'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmision()
    {
        return $this->attributes['emision'];
    }

    public function setEmision($emision)
    {
        $this->attributes['emision'] = $emision;
    }

    public function getProductLife()
    {
        return $this->attributes['product_life'];
    }

    public function setProductLife($product_life)
    {
        $this->attributes['product_life'] = $product_life;
    }

    /**
     * Get the EcoProduct that owns the NotEcoProduct.
     */
    public function ecoProducts()
    {
        return $this->hasMany(EcoProduct::class);
    }
    
    /**
     * This static function validates that the data sent has specific data type and is required.
     *
     * @param request
     * */
    public static function validate(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'emision' => 'required | numeric | gt:0',
            'product_life' => 'required | numeric |gt:0',
            'price' => 'required | numeric | gt:0 ',
            ]
        );
    }
}
