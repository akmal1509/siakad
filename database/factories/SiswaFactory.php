<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id' => 1,
        'name' => fake('name'),
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345678'),
        'role' => 'Admin',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
