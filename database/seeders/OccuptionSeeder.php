<?php

namespace Database\Seeders;

use App\Models\Occuption;
use Illuminate\Database\Seeder;

class OccuptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Occuption::truncate();
        // data json
        $data = [
            'Software Engineer',
            'Data Analyst',
            'System Administrator',
            'IT Support Specialist',
            'Frontend Developer',
            'Backend Developer',
            'Full Stack Developer',
            'Network Engineer',
            'Cybersecurity Specialist',
            'Accountant',
            'Financial Analyst',
            'Auditor',
            'Tax Consultant',
            'Bank Teller',
            'Loan Officer',
            'Investment Analyst',
            'Doctor',
            'Nurse',
            'Pharmacist',
            'Medical Laboratory Technician',
            'Radiologist',
            'Physiotherapist',
            'Healthcare Administrator',
            'Teacher',
            'Lecturer',
            'School Principal',
            'Curriculum Developer',
            'Education Consultant',
            'Researcher',
            'Civil Engineer',
            'Architect',
            'Construction Manager',
            'Surveyor',
            'Quantity Surveyor',
            'Site Supervisor',
            'Safety Officer',
            'Hotel Manager',
            'Chef',
            'Front Desk Officer',
            'Housekeeping Supervisor',
            'Event Coordinator',
            'Travel Consultant',
            'Restaurant Manager',
        ];

        foreach ($data as $key => $value) {
            Occuption::create([
                'title' => $value,
            ]);
        }
    }
}
