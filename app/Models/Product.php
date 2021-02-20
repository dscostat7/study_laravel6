<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image', 'edit'];

    public function search($filter)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })
                        ->paginate();
            return $results;
    }
}
