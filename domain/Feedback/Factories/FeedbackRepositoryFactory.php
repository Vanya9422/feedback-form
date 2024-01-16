<?php

namespace Domain\Feedback\Factories;

use Domain\Feedback\Contracts\FeedbackRepositoryFactoryInterface;
use Domain\Feedback\Repositories\FeedbackRepository;
use Domain\Feedback\Repositories\FileFeedbackRepository;

/**
 * Фабрика репозиториев для создания экземпляров репозитория.
 */
class FeedbackRepositoryFactory implements FeedbackRepositoryFactoryInterface
{
    public function make() {
        // Здесь может быть условие или конфигурация для выбора типа репозитория
        if (config('feedback.storage') === 'file') {
            return new FileFeedbackRepository();
        }

        return new FeedbackRepository();
    }
}
