<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Savannabits\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->sentence,
        'user_number' => $faker->sentence,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'first_name' => $faker->firstName,
        'middle_name' => $faker->sentence,
        'last_name' => $faker->lastName,
        'dob' => $faker->sentence,
        'gender' => $faker->sentence,
        'username' => $faker->sentence,
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'guid' => $faker->sentence,
        'domain' => $faker->sentence,
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Role::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Permission::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\ServiceEndpoint::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'endpoint' => $faker->sentence,
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\PhClass::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\PhClass::class, static function (Faker\Generator $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'name' => $faker->firstName,
        'minimum_age' => $faker->randomNumber(5),
        'maximum_age' => $faker->randomNumber(5),
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Child::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_names' => $faker->sentence,
        'last_name' => $faker->lastName,
        'bio' => $faker->text(),
        'gender' => $faker->sentence,
        'dob' => $faker->date(),
        'school' => $faker->sentence,
        'hobbies' => $faker->text(),
        'location' => $faker->text(),
        'active' => $faker->boolean(),
        'enrollment_date' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
