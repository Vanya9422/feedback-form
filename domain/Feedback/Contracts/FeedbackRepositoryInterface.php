<?php

namespace Domain\Feedback\Contracts;

use Illuminate\Database\Eloquent\Model;

interface FeedbackRepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function save(array $data);
}
