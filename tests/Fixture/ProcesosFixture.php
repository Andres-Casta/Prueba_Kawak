<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProcesosFixture
 */
class ProcesosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'PRO_ID' => 1,
                'PRO_PREFIJO' => 'Lorem ipsum dolor ',
                'PRO_NOMBRE' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
