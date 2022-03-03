<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocDocumentoFixture
 */
class DocDocumentoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'doc_documento';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'DOC_ID' => 1,
                'DOC_NOMBRE' => 'Lorem ipsum dolor sit amet',
                'DOC_CODIGO' => 1,
                'DOC_CONTENIDO' => 'Lorem ipsum dolor sit amet',
                'DOC_ID_TIPO' => 1,
                'DOC_ID_PROCESO' => 1,
            ],
        ];
        parent::init();
    }
}
