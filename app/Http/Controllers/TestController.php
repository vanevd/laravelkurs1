<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\QuestionOption;

class TestController extends Controller
{
    private $questions_per_page = 2;
    private $mode = 3; // 1,2,3

    public function index()
    {
        $data = [];
        $data['tests'] = Test::all();

        return view('tests.index', $data);
    }


    public function show($test_id, Request $request)
    {
        $request->session()->put('answers',[]);
        $page = $request->get('page', 1);
        $data = $this->getPageData($test_id, $page, $request);
        
        return view('tests.show', $data);
    }

    public function submit($test_id, Request $request)
    {
        try {
            $page = $request->get('page');
            $test = Test::find($test_id);
            $answers = $request->session()->get('answers', []);
            $questions = TestQuestion::with('options')
                ->where('test_id', $test_id)
                ->limit($this->questions_per_page)
                ->offset(($page-1) * $this->questions_per_page)
                ->get();
            $err = 0;    
            foreach ($questions as $question) {
                $option_num = $request->get('question_'.$question->id);
                if ($option_num) {
                    $answers[$question->id] = $option_num;
                } else {
                    $err = 1;
                }
            }    
            $request->session()->put('answers',$answers);
            if ($err == 1) {
                if (($this->mode == 3) && ($request->get('next') || $request->get('submit'))) {
                    throw new \Exception('Please, answer the question');
                }
            }  
            if ($request->get('previous')) {
                $page--;
                $data = $this->getPageData($test_id, $page, $request);

                return view('tests.show', $data); 
            }
            if ($request->get('next')) {
                $page++;
                $data = $this->getPageData($test_id, $page, $request);
                
                return view('tests.show', $data); 
            }
            if ($request->get('submit')) {
                $questions = TestQuestion::with('options')->where('test_id', $test_id)->get();
                $scores = 0;
                $max_scores = count($questions);
                $answers = $request->session()->get('answers', []);
                foreach ($test->questions as $question) {
                    if (isset($answers[$question->id])) {
                        $option_num = $answers[$question->id];
                        if ($option_num) {
                            $option =  QuestionOption::where('test_question_id', $question->id)->where('num', $option_num)->first();
                            if ($option->right == 1) {
                                $scores = $scores + 1; 
                            }    
                        }
                    } else {
                        if ($this->mode == 2) {
                            throw new \Exception('Please, answer all questions');
                        }    
                    }
                }
                $data = [];
                $data['test'] = $test;
                $data['questions'] = $questions;
                $data['scores'] = $scores;
                $data['max_scores'] = $max_scores;
                $data['page'] = $page;
                
                return view('tests.submit', $data);
            }          
        } catch (\Exception $e) {
            $questions = TestQuestion::with('options')->where('test_id', $test_id)->get();
            $data = $this->getPageData($test_id, $page, $request);
            $data['error'] = $e->getMessage();
            return view('tests.show', $data);
        }            
    }

    private function getPageData($test_id, $page, $request)
    {
        $test = Test::find($test_id);
        $questions = TestQuestion::with('options')
            ->where('test_id', $test_id)
            ->limit($this->questions_per_page)
            ->offset(($page-1) * $this->questions_per_page)
            ->get();
        $count_questions = TestQuestion::where('test_id', $test_id)->count();  
        $count_pages = ceil($count_questions / $this->questions_per_page);

        $data = [];
        $data['test'] = $test;
        $data['questions'] = $questions;
        $data['count_pages'] = $count_pages;
        $data['page'] = $page;
        $data['answers'] = $request->session()->get('answers', []);

        return $data;
    }
}
