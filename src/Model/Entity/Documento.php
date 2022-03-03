<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Documento Entity
 *
 * @property int $DOC_ID
 * @property string $DOC_NOMBRE
 * @property int $DOC_CODIGO
 * @property string $DOC_CONTENIDO
 * @property int $DOC_ID_TIPO
 * @property int $DOC_ID_PROCESO
 */
class Documento extends Entity
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
        'DOC_NOMBRE' => true,
        'DOC_CODIGO' => true,
        'DOC_CONTENIDO' => true,
        'DOC_ID_TIPO' => true,
        'DOC_ID_PROCESO' => true,
    ];
}
