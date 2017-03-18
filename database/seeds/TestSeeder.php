<?php

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\QuestionOption;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = Test::where('name', 'PHP')->first();
        if (!$test) {
            $test = new Test;
            $test->name = 'PHP';
            $test->level =  1;
            $test->save();

            $question = new TestQuestion;
            $question->test_id = $test->id;
            $question->num = 1;
            $question->question = 'What does PHP stand for?';
            $question->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 1;
            $option->option = 'Personal Hypertext Processor';
            $option->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 2;
            $option->option = 'Private Home Page';
            $option->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 3;
            $option->option = 'PHP: Hypertext Preprocessor';
            $option->right = 1;
            $option->save();

            $question = new TestQuestion;
            $question->test_id = $test->id;
            $question->num = 2;
            $question->question = 'PHP server scripts are surrounded by delimiters, which?';
            $question->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 1;
            $option->option = '<?php...?>';
            $option->right = 1;
            $option->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 2;
            $option->option = '<?php>...</?>';
            $option->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 3;
            $option->option = '<script>...</script>';
            $option->save();

            $option = new QuestionOption;
            $option->test_question_id = $question->id;
            $option->num = 4;
            $option->option = '<&>...</&>';
            $option->save();
        }
        
    }
}
