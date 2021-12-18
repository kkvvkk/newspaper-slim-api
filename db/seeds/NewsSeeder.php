<?php

use Phinx\Seed\AbstractSeed;

class NewsSeeder extends AbstractSeed
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
                'title' => 'Презентация нового Iphone',
                'anons' => 'Была вчера',
                'text' => 'kljasdfgklsdfjkgvn mxd,nkasrkeslfadvzxcn,hndjkf sdf,asdl;',
                'author_id' => '1',
                'rubric_id' => '4',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Apple презентовала новую IOS',
                'anons' => 'Вчера',
                'text' => 'kljasdfgklsdfjkgvn mxd,nkasrkeslfadvzxcn,hndjkf sdf,asdl;',
                'author_id' => '2',
                'rubric_id' => '4',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Apple презентовала новый процессор',
                'anons' => 'Была вчера',
                'text' => 'kljasdfgklsdfjkgvn mxd,nkasrkeslfadvzxcn,hndjkf sdf,asdl;',
                'author_id' => '1',
                'rubric_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'PHP 9',
                'anons' => 'Когда-нибудь',
                'text' => 'kljasdfgklsdfjkgvn mxd,nkasrkeslfadvzxcn,hndjkf sdf,asdl;',
                'author_id' => '1',
                'rubric_id' => '5',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],    
        ];
        $rubric = $this->table('news');
        $rubric->insert($data)->save();
    }
}