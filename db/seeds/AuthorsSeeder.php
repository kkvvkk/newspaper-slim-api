<?php

use Phinx\Seed\AbstractSeed;

class AuthorsSeeder extends AbstractSeed
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
                'firstname' => 'Иван',
                'lastname' => 'Иванов',
            ],
            [
                'id' => 2,
                'firstname' => 'Пётр',
                'lastname' => 'Петров',
            ]
        ];
        $rubric = $this->table('authors');
        $rubric->insert($data)->save();
    }
}