<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity.
 *
 * @property int $id
 * @property string $course_name
 * @property string $course_code
 * @property int $college_id
 * @property \App\Model\Entity\College $college
 * @property \App\Model\Entity\Group[] $groups
 * @property \App\Model\Entity\Student[] $students
 */
class Course extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
