<?php

namespace Domain\Feedback\Repositories;

use Domain\Common\BaseRepository;
use Domain\Feedback\Contracts\FeedbackRepositoryInterface;
use Domain\Feedback\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Feedback::class;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function save(array $data): Model {
        return $this->getModel()->newQuery()->create($data);
    }

    /**
     * @return Collection|array
     */
    public function getAll(): Collection|array
    {
        return $this->getModel()->newQuery()->get();
    }
}
