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
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Students, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '15 working days',
            'fee' => '50',
            'fee_type' => 'per page',
            'pages' => '4',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Honorable Dismissal or Transfer Credentials',
            'form_requirements' => 'Clearance Form ',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Students, Their Parents or Duly Authorized Representative  ',
            'form_max_time'=> '3 working days',
            'fee' => '50',
            'fee_type' => 'per page',
            'pages' => '4',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'CAV',
            'form_requirements' => 'TOR/ Diploma (Original and Photocopy) ',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '3 working days',
            'fee' => '50',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Certification',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '3 working days',
            'fee' => '50',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Authentication',
            'form_requirements' => 'Clearance Form and Documents for Authentication ',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '1 working days',
            'fee' => '20',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Form 137 (For Employment)',
            'form_requirements' => 'Clearance Form and Request Form issued by the Requesting School ',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '5 working days',
            'fee' => '50',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Form 137 (For Transfer Credential)',
            'form_requirements' => 'Clearance Form and Request Form issued by the Requesting School ',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '5 working days',
            'fee' => '0',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Form 138',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '30 minutes',
            'fee' => '0',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Diploma',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '30 minutes (if diploma is already available)',
            'fee' => '50',
            'fee_type' => 'Collected as part of graduation fee',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Issuance of Yearbook',
            'form_requirements' => 'Clearance Form',
            'form_process' => '30 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '30 minutes (if yearbook is already available)',
            'fee' => '0',
            'fee_type' => 'Collected as part of graduation fee',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Re-issuance of Diploma',
            'form_requirements' => 'Affidavit of Loss',
            'form_process' => '15 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Graduates, Their Parents or Duly Authorized Representative ',
            'form_max_time'=> '15 minutes (if yearbook is already available)',
            'fee' => '250',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Re-issuance of COR',
            'form_requirements' => 'Affidavit of Loss',
            'form_process' => '15 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Students',
            'form_max_time'=> '15 minutes',
            'fee' => '20',
            'fee_type' => 'None',
            'pages' => '1',
        ]);
        $form -> save();

        $form = new \App\Models\Form([
            'name' => 'Re-issuance of ID Card',
            'form_requirements' => 'Affidavit of Loss',
            'form_process' => '15 minutes',
            'form_avail'=> 'Monday to Friday (8:00 AM to 5:00 PM) ',
            'form_who_avail'=> 'Students',
            'form_max_time'=> '15 minutes',
            'fee' => '125',
            'fee_type' => 'None',
            'pages' => '1',
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
