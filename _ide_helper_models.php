<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $parent_user_id
 * @property int $parent_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, HierarchicalTree> $children
 * @property-read int|null $children_count
 * @property-read HierarchicalTree|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree query()
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereParentUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereParentUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HierarchicalTree whereUpdatedAt($value)
 */
	class HierarchicalTree extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property mixed|null $password
 * @property string $avatar
 * @property string|null $whatsapp
 * @property string $tree_structure
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTreeStructure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWhatsapp($value)
 */
	class User extends \Eloquent {}
}

