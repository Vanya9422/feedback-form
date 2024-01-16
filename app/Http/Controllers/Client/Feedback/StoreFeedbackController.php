<?php

namespace App\Http\Controllers\Client\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackRequest;
use App\Http\Resources\FeedbackResource;
use Domain\Feedback\Contracts\FeedbackRepositoryFactoryInterface;
use Domain\Feedback\Contracts\FeedbackRepositoryInterface;

class StoreFeedbackController extends Controller
{
    /**
     * Обработка запроса на сохранение обратной связи.
     * @param FeedbackRequest $feedbackRequest
     * @param FeedbackRepositoryFactoryInterface $feedbackRepositoryFactory
     * @return FeedbackResource
     */
   public function __invoke(
       FeedbackRequest $feedbackRequest,
       FeedbackRepositoryFactoryInterface $feedbackRepositoryFactory
   ): FeedbackResource {
       $feedbackFactory = $feedbackRepositoryFactory->make();

       $feedback = $feedbackFactory->save($feedbackRequest->validated());

       return FeedbackResource::make($feedback);
   }
}
