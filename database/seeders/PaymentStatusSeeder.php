<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentStatus;
class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $payments = [
        [
            'roll_no'                       =>  '180101',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180102',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180103',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180104',
            'status'                       =>  '0',

        ],
        [
            'roll_no'                       =>  '180105',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180106',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180107',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180108',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180109',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180110',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180111',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180112',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180113',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180114',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180115',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180116',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180117',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180118',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180119',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180120',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180121',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180122',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180123',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180124',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180125',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180126',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180127',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180128',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180129',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180130',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180131',
            'status'                       =>  '1',

        ],
        [
            'roll_no'                       =>  '180132',
            'status'                       =>  '0',

        ],


        // [
        //     'longitude'                       =>  'Longitude',
        //     'value'                           =>  '85.3096',
        // ],
        // [
        //     'website'                       =>  'paypal_secret_id',
        //     'value'                     =>  '',
        // ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->payments as $index => $auth)
        {
            $result = PaymentStatus::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->payments). ' records');
    }
}
