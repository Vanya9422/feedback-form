<?php

namespace App\Http\Controllers\Client\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeedbackResource;
use Domain\Feedback\Contracts\FeedbackRepositoryFactoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListFeedbackController extends Controller
{
    /**
     * @param FeedbackRepositoryFactoryInterface $feedbackRepositoryFactory
     * @return AnonymousResourceCollection
     */
   public function __invoke(
       FeedbackRepositoryFactoryInterface $feedbackRepositoryFactory
   ): AnonymousResourceCollection
   {
       $feedbackFactory = $feedbackRepositoryFactory->make();

       $feedbackList = $feedbackFactory->getAll();

       return FeedbackResource::collection($feedbackList);
   }
}
