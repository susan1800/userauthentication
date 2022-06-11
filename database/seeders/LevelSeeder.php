<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $levels = [
        [
            'value'                      => '1',
            'level'                       =>  'first semester',
        ],
        [
            'value'                      => '2',
            'level'                       =>  'second semester',
        ],
        [
            'value'                      => '3',
            'level'                       =>  'third semester',
        ],
        [
            'value'                      => '4',
            'level'                       =>  'forth semester',
        ],
        [
            'value'                      => '5',
            'level'                       =>  'fifth semester',
        ],
        [
            'value'                      => '6',
            'level'                       =>  'xixth semester',
        ],
        [
            'value'                      => '7',
            'level'                       =>  'seventh semester',
        ],
        [
            'value'                      => '8',
            'level'                       =>  'eighth semester',
        ],
    ];
    public function run()
    {
        foreach ($this->levels as $auth)
        {
            $result = Level::create($auth);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->levels). ' records');
    }
}
