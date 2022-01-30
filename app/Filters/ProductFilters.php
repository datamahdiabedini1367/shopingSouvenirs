<?php


namespace App\Filters;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductFilters
{

    public $builder;

    public function apply(Builder $builder, Request $request)
    {
//        dump($request->all());
        $this->builder = $builder;
        foreach ($request->all() as $filter => $value) {

            if (!empty($value) && method_exists($this, $filter)) {
                $this->{$filter}($value);
            }

        }

        return $this->builder;



    }

    public function product_name($value)
    {
        $this->builder->where('name', 'like', "%" . $value . "%");
    }

    public function category($value)
    {
        $this->builder->whereIn('category_id', $value);
    }

    public function brands($value)
    {
        $this->builder->whereIn('brand_id', $value);
    }

    public function min_price($value)
    {
        $this->builder->where('price', '>=', $value);
    }

    public function max_price($value)
    {
        $this->builder->where('price', '<=', $value);
    }

    public function available($value)
    {
            $this->builder->where('stock', '>', 0);
    }

    public function newest()
    {
        $this->builder->where('created_at', Carbon::now()->subDay(3));
    }

}
