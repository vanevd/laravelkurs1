<?php

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\QuestionOption;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tests = [
            [
                'name' => 'PHP',
                'level' => 1,
                'questions' => [
                    [
                        'num' => 1,
                        'question' => 'What does PHP stand for?',
                        'options' => [
                            [
                                'num' => 1,
                                'option' => 'Personal Hypertext Processor',
                            ],    
                            [
                                'num' => 2,
                                'option' => 'Private Home Page',
                            ],    
                            [
                                'num' => 3,
                                'option' => 'PHP: Hypertext Preprocessor',
                                'right' => 1,
                            ],    
                        ],
                    ],
                    [
                        'num' => 2,
                        'question' => 'PHP server scripts are surrounded by delimiters, which?',
                        'options' => [
                            [
                                'num' => 1,
                                'option' => '<?php...?>',
                                'right' => 1,
                            ],    
                            [
                                'num' => 2,
                                'option' => '<?php>...</?>',
                            ],    
                            [
                                'num' => 3,
                                'option' => '<script>...</script>',
                            ],                              [
                                'num' => 4,
                                'option' => '<&>...</&>',
                            ],    
                        ],
                    ],
                    [
                        'num' => 3,
                        'question' => 'How do you write "Hello World" in PHP',
                        'options' => [
                            [
                                'num' => 1,
                                'option' => 'echo "Hello World";',
                                'right' => 1,
                            ],    
                            [
                                'num' => 2,
                                'option' => 'Document.Write("Hello World");',
                            ],    
                            [
                                'num' => 3,
                                'option' => '"Hello World";',
                            ],    
                        ],
                    ],
                ]
            ],
        ];

        foreach ($tests as $test_item) {
            $test = Test::where('name', $test_item['name'])->first();
            if (!$test) {
                $test = new Test;
                $test->name = $test_item['name'];
                $test->level = $test_item['level'];
                $test->save();
            }    

            foreach ($test_item['questions'] as $question_item) {
                $question = TestQuestion::where('test_id', $test->id)->where('num', $question_item['num'])->first();
                if (!$question) {
                    $question = new TestQuestion;
                }    
                $question->test_id = $test->id;
                $question->num = $question_item['num'];
                $question->question = $question_item['question'];
                $question->save();    

                foreach ($question_item['options'] as $option_item) {
                    $option = QuestionOption::where('test_question_id', $question->id)->where('num', $option_item['num'])->first();
                    if (!$option) {
                        $option = new QuestionOption;
                    }    
                    $option->test_question_id = $question->id;
                    $option->num = $option_item['num'];
                    $option->option = $option_item['option'];
                    if (isset($option_item['right'])) {
                        $option->right = $option_item['right'];
                    }    
                    $option->save();
                }                
            }

        }    
    }
}
