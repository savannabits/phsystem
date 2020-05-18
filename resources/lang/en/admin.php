<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'username' => 'Username',
            'user_number' => 'User number',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'email' => "Email",
            'email_verified_at' => "Email verified at",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'first_name' => "First name",
            'middle_name' => "Middle name",
            'last_name' => "Last name",
            'dob' => "Dob",
            'gender' => "Gender",
            'username' => "Username",
            'guid' => "Guid",
            'domain' => "Domain",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'permission' => [
        'title' => 'Permissions',

        'actions' => [
            'index' => 'Permissions',
            'create' => 'New Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'service-endpoint' => [
        'title' => 'Service Endpoints',

        'actions' => [
            'index' => 'Service Endpoints',
            'create' => 'New Service Endpoint',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'endpoint' => 'Endpoint',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'ph-class' => [
        'title' => 'Ph Classes',

        'actions' => [
            'index' => 'Ph Classes',
            'create' => 'New Ph Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'ph-class' => [
        'title' => 'Ph Classes',

        'actions' => [
            'index' => 'Ph Classes',
            'create' => 'New Ph Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'minimum_age' => 'Minimum age',
            'maximum_age' => 'Maximum age',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'child' => [
        'title' => 'Children',

        'actions' => [
            'index' => 'Children',
            'create' => 'New Child',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'middle_names' => 'Middle names',
            'last_name' => 'Last name',
            'bio' => 'Bio',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'school' => 'School',
            'hobbies' => 'Hobbies',
            'location' => 'Location',
            'active' => 'Active',
            'enrollment_date' => 'Enrollment date',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation






];