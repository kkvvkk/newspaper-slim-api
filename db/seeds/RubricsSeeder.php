<?php

use Phinx\Seed\AbstractSeed;

class RubricsSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [  
            [
                'id' => 1,
                'name' => 'Электроника',
            ],
            [
                'id' => 2,
                'name' => 'Программное обеспечение',
            ],
            [
                'id' => 3,
                'name' => 'Телефоны',
                'head_rubric' => 1
            ],
            [
                'id' => 4,
                'name' => 'Iphone',
                'head_rubric' => 3
            ],
            [
                'id' => 5,
                'name' => 'PHP',
                'head_rubric' => 2
            ]
        ];
        $rubric = $this->table('rubrics');
        $rubric->insert($data)->save();
    }
}
