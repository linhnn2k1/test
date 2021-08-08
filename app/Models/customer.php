<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    public $primarykey = 'id';
    public $timestamps = false;
    public function getgioitinhAttribute(){
        if($this->gender == 1){
            return 'Nam';
        }else{
            return 'Nữ';
        }
    }
}

