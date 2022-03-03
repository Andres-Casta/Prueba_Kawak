<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TipodocsFixture
 */
class TipodocsFixture extends TestFixture
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
                'TIP_ID' => 1,
                'TIP_NOMBRE' => 'Lorem ipsum dolor sit amet',
                'TIP_PREFIJO' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}
