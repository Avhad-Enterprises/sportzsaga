<?

namespace App\Models;

use CodeIgniter\Model;

class SectionVisibilityModel extends Model
{
    protected $table = 'section_visibility';
    protected $primaryKey = 'id';
    protected $allowedFields = ['section_name', 'is_visible'];
}
