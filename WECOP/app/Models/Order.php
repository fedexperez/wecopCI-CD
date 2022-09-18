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
 * Class Order
 *
 * @package App/Models
 */
class Order extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['payment_type', 'user_id', 'address_id'];
    
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }

    public function getPaymentType()
    {
        return $this->attributes['payment_type'];
    }

    public function setPaymentType($paymentType)
    {
        $this->attributes['payment_type'] = $paymentType;
    }

    public function getDateFormated()
    {
        return date('d/m/Y', strtotime($this->attributes['date']));
    }

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function setDate($date)
    {
        $this->attributes['date'] = $date;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    /**
     * Get the Items of the order.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the Address of the order.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the User that made the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate(Request $request)
    {
        $request->validate([
            'paymentType' => 'required',
            'address_id' => 'required',
        ]);
    }
}
