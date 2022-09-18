<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP version: 8.0.2
 */

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EcoProduct
 *
 * @package App/Models
 */
class EcoProduct extends Model
{
    use HasFactory;

    //Attributes id, name, price, stock, description, facts, categories, emision, product_life, photo
    protected $fillable = ['name', 'price', 'stock', 'facts', 'description', 'categories', 'emision', 'not_eco_product_id', 'product_life', 'photo'];

    /**
     * Get the Items associated with the EcoProduct.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the Reviews associated with the EcoProduct.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

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

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function getFacts()
    {
        return $this->attributes['facts'];
    }

    public function setFacts($facts)
    {
        $this->attributes['facts'] = $facts;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getCategories()
    {
        return $this->attributes['categories'];
    }

    public function setCategories($categories)
    {
        $this->attributes['categories'] = $categories;
    }

    public function getEmision()
    {
        return $this->attributes['emision'];
    }

    public function getProductLife()
    {
        return $this->attributes['product_life'];
    }

    public function setProductLife($product_life)
    {
        $this->attributes['product_life'] = $product_life;
    }

    public function getPhoto()
    {
        return $this->attributes['photo'];
    }

    public function setPhoto($photo)
    {
        $this->attributes['photo'] = $photo;
    }

    /**
     * Get the NotEcoProduct associated with the EcoProduct.
     */
    public function notEcoProduct()
    {
        return $this->belongsTo(NotEcoProduct::class);
    }


    /**
     * This static function validates that the data sent has specific data type and is required.
     *
     * @param request
     * */
    public static function validate(Request $request)
    {
        //['name', 'price', 'stock', 'facts', 'description', 'categories', 'emision', 'product_life', 'photo']
        $request->validate(
            [
            'name' => 'required',
            'price' => 'required | numeric | gt:0',
            'stock' => 'required | numeric | min:0',
            'facts' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'emision' => 'required | numeric | gt:0',
            'product_life' => 'required',
            'photo' => 'required',
            ]
        );
    }
}
