<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\LessonResource
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon $published_at
 * @property int $enabled
 * @property int $uploaded_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LessonResource whereUploadedBy($value)
 */
	class LessonResource extends \Eloquent {}
}

namespace App{
/**
 * App\ResourceType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ResourceType whereUpdatedAt($value)
 */
	class ResourceType extends \Eloquent {}
}

namespace App{
/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $group
 * @property-read mixed $display_name
 * @property-read mixed $permission_group
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App{
/**
 * App\Lesson
 *
 * @property int $id
 * @property int $ph_class_id
 * @property int $facilitator_id
 * @property \Illuminate\Support\Carbon $lesson_date
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string $objective
 * @property string|null $activities
 * @property string|null $biblical_passage
 * @property string|null $homework
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereActivities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereBiblicalPassage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereFacilitatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereHomework($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereLessonDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereObjective($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson wherePhClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lesson whereUpdatedAt($value)
 */
	class Lesson extends \Eloquent {}
}

namespace App{
/**
 * App\AttendanceStatus
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property int|null $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Attendance[] $attendances
 * @property-read int|null $attendances_count
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AttendanceStatus whereUpdatedAt($value)
 */
	class AttendanceStatus extends \Eloquent {}
}

namespace App{
/**
 * App\PhClass
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property int $minimum_age
 * @property int $maximum_age
 * @property string $description
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Child[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Enrollment[] $enrollments
 * @property-read int|null $enrollments_count
 * @property-read mixed $current_enrollments
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RollCall[] $rollCalls
 * @property-read int|null $roll_calls_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereMaximumAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereMinimumAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhClass whereUpdatedAt($value)
 */
	class PhClass extends \Eloquent {}
}

namespace App{
/**
 * App\Attendance
 *
 * @property int $id
 * @property int $enrollment_id
 * @property int $roll_call_id
 * @property int $attendance_status_id
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Enrollment $enrollment
 * @property-read mixed $resource_url
 * @property-read \App\RollCall $rollCall
 * @property-read \App\AttendanceStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereAttendanceStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereEnrollmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereRollCallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendance whereUpdatedAt($value)
 */
	class Attendance extends \Eloquent {}
}

namespace App{
/**
 * App\Enrollment
 *
 * @property int $id
 * @property int $child_id
 * @property int $ph_class_id
 * @property \Illuminate\Support\Carbon $enrollment_date
 * @property \Illuminate\Support\Carbon|null $graduation_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_current
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Attendance[] $attendances
 * @property-read int|null $attendances_count
 * @property-read \App\Child $child
 * @property-read mixed $resource_url
 * @property-read \App\PhClass $phClass
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereChildId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereEnrollmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereGraduationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment wherePhClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enrollment whereUpdatedAt($value)
 */
	class Enrollment extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $dob
 * @property string|null $gender
 * @property string $username
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $guid
 * @property string|null $domain
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Child[] $children
 * @property-read int|null $children_count
 * @property-read mixed $avatar_thumb
 * @property-read mixed $avatar_url
 * @property-read mixed $full_name
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Relative[] $relatives
 * @property-read int|null $relatives_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia\HasMedia {}
}

namespace App{
/**
 * App\RelationshipType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationshipType whereUpdatedAt($value)
 */
	class RelationshipType extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $api_url
 * @property-read mixed $display_name
 * @property-read mixed $permissions_matrix
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\GeneralResource
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon $published_at
 * @property int $enabled
 * @property int $uploaded_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralResource whereUploadedBy($value)
 */
	class GeneralResource extends \Eloquent {}
}

namespace App{
/**
 * App\RollCall
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int $ph_class_id
 * @property int $created_by
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Attendance[] $attendances
 * @property-read int|null $attendances_count
 * @property-read \App\User $creator
 * @property-read mixed $end
 * @property-read mixed $is_marked
 * @property-read mixed $resource_url
 * @property-read mixed $start
 * @property-read mixed $title
 * @property-read \App\PhClass $phClass
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall wherePhClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RollCall whereUpdatedAt($value)
 */
	class RollCall extends \Eloquent {}
}

namespace App{
/**
 * App\Child
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_names
 * @property string $last_name
 * @property string $bio
 * @property string $gender
 * @property string $dob
 * @property string|null $school
 * @property array|null $hobbies
 * @property string|null $location
 * @property bool $active
 * @property string $enrollment_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $current_enrollment_id
 * @property-read \App\Enrollment|null $currentEnrollment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Enrollment[] $enrollments
 * @property-read int|null $enrollments_count
 * @property-read mixed $age
 * @property-read mixed $avatar_thumb
 * @property-read mixed $avatar_url
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PhClass[] $phClasses
 * @property-read int|null $ph_classes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Relative[] $relatives
 * @property-read int|null $relatives_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereCurrentEnrollmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereEnrollmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereHobbies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereMiddleNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Child whereUpdatedAt($value)
 */
	class Child extends \Eloquent implements \Spatie\MediaLibrary\HasMedia\HasMedia {}
}

namespace App{
/**
 * App\Relative
 *
 * @property int $id
 * @property int $user_id
 * @property int $child_id
 * @property int $relationship_type_id
 * @property string|null $custom_relationship
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Child $child
 * @property-read mixed $resource_url
 * @property-read \App\RelationshipType $relationshipType
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereChildId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereCustomRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereRelationshipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relative whereUserId($value)
 */
	class Relative extends \Eloquent {}
}

