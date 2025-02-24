<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponse;
use Illuminate\Support\Facades\DB;



class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            'คุณชอบสีอะไร?',
            'อาหารที่คุณชอบมากที่สุด?',
            'ระหว่างไก่กับไข่ คุณชอบกินหมูแบบไหน?',
            'เย็นนี้คุณจะกินบุฟเฟต์หรือออกกำลังกาย?',
            'คุณชอบฟังเพลงแนวไหน?',
            'คุณชอบดูหนังแนวไหนมากกว่ากัน?',
            'อาหารจานโปรดของคุณคืออะไร',
            'ถ้าอยากไปเที่ยวระหว่างทะเลกับภูเขา คุณจะหาเงินจากที่ไหนไป?',
            'คุณเคยมีคนที่แอบชอบเเล้วเขาเห็นเราเป็นแค่เพื่อนคนหนึ่งไหม?',
            'คุณชอบนักฟุตบอลคนไหนมากที่สุด'
        ];

        foreach ($questions as $question) {
            $createdQuestion = SurveyQuestion::create([
                'question' => $question
            ]);
            // เพิ่มคำตอบตัวอย่าง (คุณสามารถปรับให้ผู้ใช้กรอกเองในภายหลัง)
            // SurveyResponse::create([
            //     'survey_question_id' => $createdQuestion->id,
            //     'answer' => 'คำตอบตัวอย่าง' // คำตอบที่กรอกไว้
            // ]);
        }




        // $questions = [
        //     'คุณชอบสีอะไร?' => ['สีแดง', 'สีน้ำเงิน', 'สีเขียว', 'สีเหลือง'],
        //     'คุณชอบกินข้าวหรือก๋วยเตี๋ยว?' => ['ข้าว', 'ก๋วยเตี๋ยว'],
        //     'ระหว่างไก่กับไข่ คุณชอบกินหมูแบบไหน?' => ['หมูกรอบ', 'หมูย่าง', 'หมูตุ๋น'],
        //     'เย็นนี้คุณจะกินบุฟเฟต์หรือออกกำลังกาย?' => ['กินบุฟเฟต์', 'ออกกำลังกาย'],
        //     'คุณชอบฟังเพลงแนวไหน?' => ['ป๊อป', 'ร็อค', 'แจ๊ส', 'ฮิปฮอป'],
        //     'คุณชอบดูหนังแนวไหนมากกว่ากัน?' => ['ป๊อป', 'ร็อค', 'แจ๊ส', 'ฮิปฮอป'],
        //     'ปกติคุณเรียกกีฬาฟุตบอลว่าอะไรระหว่าง football หรือ soccer?' => ['Football', 'Soccer'],
        //     'ถ้าอยากไปเที่ยวระหว่างทะเลกับภูเขา คุณจะหาเงินจากที่ไหนไป?' => ['ทำงาน', 'ยืมเงินเพื่อน', 'ขอตังพ่อแม่', 'ฮิปฮอป'],
        //     'คุณเคยมีคนที่แอบชอบแล้วเขาเห็นเราเป็นแค่เพื่อนคนหนึ่งไหม?' => ['เคย', 'ไม่เคย', 'ไม่พูดถึงละกัน'],
        //     'คุณชอบนักฟุตบอลคนไหนมากที่สุด' => ['Salah', 'Antony', 'Ronaldo', 'Messi'],
        // ];

        // foreach ($questions as $questionText => $options) {
        //     $questionId = DB::table('survey_questions')->insertGetId([
        //         'question' => $questionText,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        //     foreach ($options as $optionText) {
        //         DB::table('survey_options')->insert([
        //             'survey_question_id' => $questionId,
        //             'option_text' => $optionText, // เปลี่ยนจาก 'option_text' เป็น 'option'
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
    }
}
