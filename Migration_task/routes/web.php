<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('cate', function () {
    // return DB::table('categories')->get();
    return view('welcome');
});

// Route::get('categories', function () {
//      DB::table('categories')->insert(
//         [
//             [
//                 'name' => 'Electronics',
//                 'description' => 'Devices and gadgets'
//             ],
//             [
//                 'name' => 'Clothing',
//                 'description' => 'Apparel and accessories'
//             ],
//             [
//                 'name' => 'Books',
//                 'description' => 'Printed and digital books'
//             ]
//         ]
//     );
//     return DB::table('categories')->get();
// });

