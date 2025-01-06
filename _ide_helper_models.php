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
 * @property int|null $submission_id
 * @property string $budget
 * @property string $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Submission|null $submission
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disbursement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Disbursement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $period
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Submission> $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisbursementPeriod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class DisbursementPeriod extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $iku
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku1 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Iku1 extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $iku
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku2 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Iku2 extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $iku
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iku3 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Iku3 extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $iku
 * @property string $ppuf_number
 * @property string $activity_type
 * @property string $program_name
 * @property string $description
 * @property string $place
 * @property string $date
 * @property-read string $budget
 * @property string|null $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Role|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Submission> $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereIku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf wherePpufNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereProgramName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf withoutTrashed()
 * @property string $period
 * @property-read mixed $budget_idr
 * @method static \Illuminate\Database\Eloquent\Builder|Ppuf wherePeriod($value)
 * @mixin \Eloquent
 */
	class Ppuf extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $role
 * @property string $parent_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Role> $children
 * @property-read int|null $children_count
 * @property-read Role|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ppuf> $ppuf
 * @property-read int|null $ppuf_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutTrashed()
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $ppuf_id
 * @property int|null $role_id
 * @property int|null $iku1_id
 * @property int|null $iku2_id
 * @property int|null $iku3_id
 * @property string $background
 * @property string $speaker
 * @property string $participant
 * @property string $place
 * @property string $date
 * @property string $rundown
 * @property string $vendor
 * @property string $budget
 * @property string|null $approved_budget
 * @property string|null $report_file
 * @property int $is_disbursement_complete
 * @property int $is_done
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Iku1|null $iku1
 * @property-read \App\Models\Iku2|null $iku2
 * @property-read \App\Models\Iku3|null $iku3
 * @property-read \App\Models\Ppuf|null $ppuf
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubmissionStatus> $status
 * @property-read int|null $status_count
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereApprovedBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIku1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIku2Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIku3Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIsDisbursementComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereParticipant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission wherePpufId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereReportFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereRundown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereSpeaker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission withoutTrashed()
 * @property array $budget_detail
 * @property int|null $disbursement_period_id
 * @property-read \App\Models\Role|null $approval
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disbursement> $disbursements
 * @property-read int|null $disbursements_count
 * @property-read mixed $can_edit
 * @property-read \App\Models\DisbursementPeriod|null $period
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereBudgetDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereDisbursementPeriodId($value)
 * @property-read mixed $approved_budget_idr
 * @property-read mixed $budget_idr
 * @mixin \Eloquent
 */
	class Submission extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $role_id
 * @property int|null $submission_id
 * @property int $status
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Role|null $role
 * @property-read \App\Models\Submission|null $submission
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubmissionStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SubmissionStatus extends \Eloquent {}
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
 * @property string|null $bank_name
 * @property string|null $bank_account_number
 * @property string|null $bank_account_name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $role
 * @property-read int|null $role_count
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @property-read \App\Models\Role|null $strictRole
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

