<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Program;
use App\Models\Level;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   protected $subjects;
    public function run()
    {
        $programs = Program::get();
        
        foreach($programs as $program){
            if($program->program == "information technology"){
                $IT = $program->id;
            }
            if($program->program == "computer"){
                $computer = $program->id;
            }
            if($program->program == "civil"){
                $civil = $program->id;
            }
            if($program->program == "civil"){
                $civil = $program->id;
            }
        }
        $levels = Level::get();
        foreach($levels as $level){
            if($level->level == "first semester"){
                $first = $level->id;
            }
            if($level->level == "second semester"){
                $second = $level->id;
            }
            if($level->level == "third semester"){
                $third = $level->id;
            }
            if($level->level == "forth semester"){
                $forth = $level->id;
            }
            if($level->level == "fifth semester"){
                $fifth = $level->id;
            }
            if($level->level == "sixth semester"){
                $sixth = $level->id;
            }
            if($level->level == "seventh semester"){
                $seventh = $level->id;
            }
            if($level->level == "eighth semester"){
                $eighth = $level->id;
            }
        }
        $subjects = [
            [
                'subject'                       =>  'Engineering Mathematics I',
                'subject_code'                   =>  'MTH112',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Physics',
                'subject_code'                   =>  'PHY111',
                
                
                'credit_hours'                     => '4',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Communication Technique',
                'subject_code'                   =>  'ENG111',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Basic Electrical Engineering',
                'subject_code'                   =>  'ELE110',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Problem Solving Technique',
                'subject_code'                   =>  'CMP114',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Programing In C',
                'subject_code'                   =>  'CMP113',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$first,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Engineering Mathematics II',
                'subject_code'                   =>  'MTH114',
                
                'concorrent_id'                    => '1',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Nerwork Theory',
                'subject_code'                   =>  'ELE110',
                
                'concorrent_id'                    => '4',
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'MFCS',
                'subject_code'                   =>  'MTH130',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'ED',
                'subject_code'                   =>  'ELX210',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'Eng Drawing',
                'subject_code'                   =>  'MEC120',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],
            [
                'subject'                       =>  'C++',
                'subject_code'                   =>  'CMP115',
                
                
                'credit_hours'                     => '3',
                'level_id'                          =>$second,
                'program_id'                        =>$IT,
            ],

        ];

        foreach ($subjects as $subject)
        {
            $result = Subject::create($subject);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        // $this->command->info('Inserted '.count($this->subjects). ' records');
    
    }
}
