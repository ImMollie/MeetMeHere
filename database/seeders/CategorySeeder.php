<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $generator = Factory::create();
        $categories = [
            1 => 'Dog',
            2 => 'Beer',
            3 => 'Movie',
            4 => 'Date',
            5 => 'Vacation',
            6 => 'Trip',
            7 => 'Cycling',
            8 => 'Diving',
            9 => 'Climbing',
        ];

        $types = [
            1 => 'Animals',
            2 => 'Social',
            3 => 'Social',
            4 => 'Social',
            5 => 'Travel',
            6 => 'Travel',
            7 => 'Sport',
            8 => 'Sport',
            9 => 'Sport',
        ];

        $images = [
            1 => 'https://img.freepik.com/free-vector/cute-australian-shepherd_138676-2071.jpg?w=826&t=st=1665583505~exp=1665584105~hmac=20b1b81b89ab5b20587822c025aa7461ad5a3877c1b2ca4d6babaa373dc960aa', 
            2 => 'https://img.freepik.com/free-vector/realistic-isolated-glass-beer-with-drops_1284-41687.jpg?w=826&t=st=1665583606~exp=1665584206~hmac=7423168ee147e2b935ffd432dd6d379fd17e91bc4ffd8409ae1ffee032a8e9f1', 
            3 => 'https://img.freepik.com/free-vector/couple-cinema-illustration-young-boy-girl-watching-movie-together_33099-278.jpg?w=826&t=st=1665583659~exp=1665584259~hmac=86f817b9d053c77fd0062e4883c369b404285b0d7255dc1541d5c1d30923a1f8', 
            4 => 'https://img.freepik.com/free-vector/holding-hands-concept-illustration_114360-8448.jpg?w=826&t=st=1665583715~exp=1665584315~hmac=716ecd034b3185caafc9ae33072ea33be7a77c1947c75fd1c432230d93614545', 
            5 => 'https://img.freepik.com/free-vector/flat-design-world-tourism-day-style_23-2148639397.jpg?3&w=826&t=st=1665584718~exp=1665585318~hmac=3ff8256a16b19d8f0f81927b8554125d9dd1934693a5fe0e149688c575948b0f', 
            6 => 'https://img.freepik.com/free-vector/travelers-concept-illustration_114360-2602.jpg?w=826&t=st=1665583790~exp=1665584390~hmac=0c7db404d96f26a4655c70cc4448ee6b1c11903a0740d84d1c23fedf216ef644', 
            7 => 'https://img.freepik.com/free-vector/man-riding-bicycle-exercise_24877-54701.jpg?w=826&t=st=1665584765~exp=1665585365~hmac=2d2e636e95ccfc4c68de2c8531e9793c94c98d06f92073a5131c7e5efec4cef8', 
            8 => 'https://img.freepik.com/free-vector/diving-concept-illustration_114360-2004.jpg?w=826&t=st=1665583862~exp=1665584462~hmac=d81055cd675fc7a47866de5353a7d14e50d95ca8b68c3820e70aee843bcd9358', 
            9 => 'https://img.freepik.com/free-vector/climbing-concept-illustration_114360-5447.jpg?w=826&t=st=1665584799~exp=1665585399~hmac=d00154ce230a011eadb8b276f8104cecb8231113381ef7e34fd174eb0e04ece8', 
        ];

        foreach($categories as $category => $categories) {            
            DB::table('categories')->insert([
                'categoryName' => $categories, 
                'categoryType' => $types[$category],
                'categoryIMG' => $images[$category],               
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
        }
    }
}
