<?php

namespace App\Repositories\Contracts;

interface ExamScheduleRepositoryContract
{
    public function insertMultiple ($exam_schedules);

    public function upsert ($exam_schedule);

    public function get ($id_student);

    public function getLatestTerm ($id_student);

    public function delete ($id_student, $id_term);
}