<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = new \App\Models\Form([
            'name' => 'Issuance of Transcript of Records',
            'form_requirements' => 'Clearance Form ',
            'form_process' => '30 minutes',
            'fee' => 'Php50.00 / page',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Students, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '15 working days after request is filed',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Honorable Dismissal or Transfer Credentials',
            'form_requirements' => 'Clearance Form ',
            'form_process' => '30 minutes',
            'fee' => 'Php50.00 / page',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Students, Their Parents or Duly Authorized Representative  ',
            'form_max_time'=> '3 working days after request is filed',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'CAV',
            'form_requirements' => 'TOR/ Diploma (Original and Photocopy) ',
            'form_process' => '30 minutes',
            'fee' => 'Php50.00',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '3 working days after request is filed',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Certification',
            'form_requirements' => 'Clearance Form ) ',
            'form_process' => '30 minutes',
            'fee' => 'Php50.00',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '3 working days after request is filed',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Authentication',
            'form_requirements' => 'Clearance Form and Documents for Authentication ',
            'form_process' => '30 minutes',
            'fee' => 'Php20.00',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '1 working days after request is filed',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Form 137',
            'form_requirements' => 'Clearance Form and Request Form issued by the Requesting School ',
            'form_process' => '30 minutes',
            'fee' => 'Php50.00 (if Form 137 is for employment)
            None (if Form 137 is for use as transfer credential
            ',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '5 working days after request is filed',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Form 138',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'fee' => 'None',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '30 minutes',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Diploma',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'fee' => 'Php50.00 (collected as part of graduation fee)',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '30 minutes (if diploma is already available)',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Yearbook',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'fee' => '(collected as part of graduation fee)',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '30 minutes (if yearbook is already available)',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Re-issuance of Diploma',
            'form_requirements' => 'Affidavit of Loss',
            'form_process' => '15 minutes',
            'fee' => 'Php250.00',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '15 minutes (if yearbook is already available',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Re-issuance of COR / ID Card',
            'form_requirements' => 'Affidavit of Loss',
            'form_process' => '15 minutes',
            'fee' => 'Php20.00 for the COR;
            Php125 for the ID Card
            ',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Students',
            'form_max_time'=> '15 minutes',
        ]);
        $form -> save();

        $announcement = new \App\Models\Announcement([
            'announcement_title' => 'Closed Transactions on April 28, 2023',
            'announcement_text' => 'This is an important announcement from the Office of the Registrar. Due to necessary maintenance and upgrades, our registration system will be temporarily down for one week, starting Monday, April 10th at 8:00 am and ending Monday, April 17th at 8:00 am.  ',
        ]);
        $announcement -> save();

        $announcement = new \App\Models\Announcement([
            'announcement_title' => 'Closed Transactions on April 21, 2023',
            'announcement_text' => "We would like to inform you that our registrar's office will be closed on April 21 2023, in observance of Eid al-Fitr, the festival of breaking the fast that marks the end of Ramadan.
            ",
        ]);
        $announcement -> save();
    }
}
