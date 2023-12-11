<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueLibraryCard extends Model
{
    use SoftDeletes;
    protected $fillable = ['student_id', 'card_no', 'issue_date', 'card_status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
?>