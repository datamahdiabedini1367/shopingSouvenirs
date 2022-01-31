<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'گز اصفهان','سوهان قم','قطاب یزد','چاقوی زنجان','گلیم بندرعباس','قرابیه','نوقا','ریس','قند پنیری','فرش تبریز','معرق تبریز','کفش چرم تبریز','گل محمدی','نقل زعفرانی','نقل بید مشکی','حلوا','پولکی','شرینی کرکی','سوهان عسلی','کاسه مینا کاری شده','پارچه قلم کاری شده','دیگ مسی','سماور مسی','بشی برساق','کله گنجی','حلوای بگل','نان گرده','نان ساج','ترخینه','گیوه','گلیم','خرما','خارک','حصیر ','عبا','بادام درختی','گروه','گلاب','زعفران','زرشک','نبات','مهر','تسبیح','جانماز','عطر','انگشتر',            ]),
            'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه .',

//            'image' => 'https://via.placeholder.com/286x180?text=Image',
            'price' => $this->faker->randomElement([
                150000, 450000, 252000, 2521000, 250000, 150000, 850000, 650000, 450000, 950000, 410000, 320000
            ]),
            'slug' => Str::random('6'),
            'stock' => $this->faker->randomDigitNotNull,
            'category_id' => $this->faker->randomElement(Category::query()->pluck('id')->toArray()),
        ];
    }
}
