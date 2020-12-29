<?php

namespace App\Repository;

interface LectureRepoInterface
{
    public function all();
    public function create(array $data);
    public function show($id);
    public function update(array $data, $id);
    public function delete($id);
}
