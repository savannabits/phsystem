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
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\AttendanceStatus::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->sentence,
        'name' => $faker->firstName,
        'description' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\ResourceType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Enrollment::class, static function (Faker\Generator $faker) {
    return [
        'child_id' => $faker->sentence,
        'ph_class_id' => $faker->sentence,
        'enrollment_date' => $faker->date(),
        'graduation_date' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\RollCall::class, static function (Faker\Generator $faker) {
    return [
        'date' => $faker->date(),
        'ph_class_id' => $faker->sentence,
        'created_by' => $faker->sentence,
        'description' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Attendance::class, static function (Faker\Generator $faker) {
    return [
        'enrollment_id' => $faker->sentence,
        'roll_call_id' => $faker->sentence,
        'attendance_status_id' => $faker->sentence,
        'comment' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\LessonResource::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'published_at' => $faker->dateTime,
        'enabled' => $faker->boolean(),
        'uploaded_by' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\GeneralResource::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'published_at' => $faker->dateTime,
        'enabled' => $faker->boolean(),
        'uploaded_by' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Lesson::class, static function (Faker\Generator $faker) {
    return [
        'ph_class_id' => $faker->sentence,
        'facilitator_id' => $faker->sentence,
        'lesson_date' => $faker->date(),
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
        'objective' => $faker->sentence,
        'activities' => $faker->text(),
        'biblical_passage' => $faker->text(),
        'homework' => $faker->text(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\RelationshipType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Relative::class, static function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->sentence,
        'child_id' => $faker->sentence,
        'relationship_type_id' => $faker->sentence,
        'custom_relationship' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
