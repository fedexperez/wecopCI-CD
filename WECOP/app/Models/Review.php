<?php

/**
 * WECOP
 *
 * @author fperezm1
 * PHP version: 8.0.2
 */

namespace App\Models;
 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 *
 * @package App/Models
 */
class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    //attributes id, rating, title, message
    protected $fillable = ['rating', 'title', 'message', 'eco_product_id', 'user_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getMessage()
    {
        return $this->attributes['message'];
    }

    public function setMessage($message)
    {
        $this->attributes['message'] = $message;
    }
    
    /**
     * Get the EcoProduct that owns the Review.
     */
    public function ecoProduct()
    {
        return $this->belongsTo(EcoProduct::class);
    }

    /**
     * Get the User who post the Review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate(Request $request)
    {

        $request->validate([
            'rating' => 'required|numeric|gt:0|max:5',
            'title' => 'required',
            'message' => 'required',
        ]);
    }
}
