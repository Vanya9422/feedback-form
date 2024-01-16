<?php

use Domain\Feedback\{
    Contracts\FeedbackRepositoryFactoryInterface,
    Contracts\FeedbackRepositoryInterface,
    Factories\FeedbackRepositoryFactory,
    Repositories\FeedbackRepository
};

return [
    'enabled' => true,
    'repositories' => [
        FeedbackRepositoryInterface::class => FeedbackRepository::class,
        FeedbackRepositoryFactoryInterface::class => FeedbackRepositoryFactory::class,
    ]
];
