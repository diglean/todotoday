<?php

namespace App\Models;

use App\Domain\Task\Enums\TaskCategory;
use App\Domain\Task\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property TaskCategory $category
 * @property string $description
 * @property int $assigned_to
 * @property TaskStatus $status
 * @property int $created_by
 * @property Carbon $overdue_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereOverdueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public $casts = [
		'category' => TaskCategory::class,
        'status' => TaskStatus::class,
		'overdue_date' => 'datetime: Y-m-d H:i:s',
		'created_at' => 'datetime: Y-m-d H:i:s',
		'updated_at' => 'datetime: Y-m-d H:i:s',
    ];
}
