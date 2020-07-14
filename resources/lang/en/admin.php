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

    'attendance-status' => [
        'title' => 'Attendance Statuses',

        'actions' => [
            'index' => 'Attendance Statuses',
            'create' => 'New Attendance Status',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'resource-type' => [
        'title' => 'Resource Types',

        'actions' => [
            'index' => 'Resource Types',
            'create' => 'New Resource Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'enrollment' => [
        'title' => 'Enrollments',

        'actions' => [
            'index' => 'Enrollments',
            'create' => 'New Enrollment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'child_id' => 'Child',
            'ph_class_id' => 'Ph class',
            'enrollment_date' => 'Enrollment date',
            'graduation_date' => 'Graduation date',
            
        ],
    ],

    'roll-call' => [
        'title' => 'Roll Calls',

        'actions' => [
            'index' => 'Roll Calls',
            'create' => 'New Roll Call',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'ph_class_id' => 'Ph class',
            'created_by' => 'Created by',
            'description' => 'Description',
            
        ],
    ],

    'attendance' => [
        'title' => 'Attendances',

        'actions' => [
            'index' => 'Attendances',
            'create' => 'New Attendance',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'enrollment_id' => 'Enrollment',
            'roll_call_id' => 'Roll call',
            'attendance_status_id' => 'Attendance status',
            'comment' => 'Comment',
            
        ],
    ],

    'lesson-resource' => [
        'title' => 'Lesson Resources',

        'actions' => [
            'index' => 'Lesson Resources',
            'create' => 'New Lesson Resource',
            'edit' => 'Edit :name',
            'will_be_published' => 'LessonResource will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            'uploaded_by' => 'Uploaded by',
            
        ],
    ],

    'general-resource' => [
        'title' => 'General Resources',

        'actions' => [
            'index' => 'General Resources',
            'create' => 'New General Resource',
            'edit' => 'Edit :name',
            'will_be_published' => 'GeneralResource will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            'uploaded_by' => 'Uploaded by',
            
        ],
    ],

    'lesson' => [
        'title' => 'Lessons',

        'actions' => [
            'index' => 'Lessons',
            'create' => 'New Lesson',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ph_class_id' => 'Ph class',
            'facilitator_id' => 'Facilitator',
            'lesson_date' => 'Lesson date',
            'start_time' => 'Start time',
            'end_time' => 'End time',
            'objective' => 'Objective',
            'activities' => 'Activities',
            'biblical_passage' => 'Biblical passage',
            'homework' => 'Homework',
            'enabled' => 'Enabled',
            
        ],
    ],

    'relationship-type' => [
        'title' => 'Relationship Types',

        'actions' => [
            'index' => 'Relationship Types',
            'create' => 'New Relationship Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'relative' => [
        'title' => 'Relatives',

        'actions' => [
            'index' => 'Relatives',
            'create' => 'New Relative',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'child_id' => 'Child',
            'relationship_type_id' => 'Relationship type',
            'custom_relationship' => 'Custom relationship',
            
        ],
    ],

    'attendance-status' => [
        'title' => 'Attendance Statuses',

        'actions' => [
            'index' => 'Attendance Statuses',
            'create' => 'New Attendance Status',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'relative' => [
        'title' => 'Relatives',

        'actions' => [
            'index' => 'Relatives',
            'create' => 'New Relative',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'child_id' => 'Child',
            'relationship_type_id' => 'Relationship type',
            'custom_relationship' => 'Custom relationship',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation


















];