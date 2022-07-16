<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Problum extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','icon_image','icon_hyperlink','status'];
}