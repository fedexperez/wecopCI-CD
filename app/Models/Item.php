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

/**
 * Class Item
 *
 * @package App/Models
 */
class Item extends Model
{
    use HasFactory;

    //Attributes subtotal, quantity, product_id, order_id
    protected $fillable = ['subtotal', 'quantity', 'product_id', 'order_id'];

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    /**
     * Get the EcoProducts that owns the item.
     */
    public function ecoProduct()
    {
        return $this->belongsTo(EcoProduct::class);
    }

    /**
     * Get the Order that owns the items.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
