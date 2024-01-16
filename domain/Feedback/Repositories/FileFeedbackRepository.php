<?php

namespace Domain\Feedback\Repositories;

use Domain\Feedback\Contracts\FeedbackRepositoryInterface;
use Domain\Feedback\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Класс репозитория для сохранения обратной связи в файл.
 */
class FileFeedbackRepository implements FeedbackRepositoryInterface
{
    /**
     * @var string
     */
    protected string $filePath = 'feedback.json';

    /**
     * Сохранение данных обратной связи в файл.
     * @param array $data
     * @return Feedback
     */
    public function save(array $data): Feedback {

        $feedbackData = Storage::get($this->filePath);
        $feedbackData = json_decode($feedbackData, true) ?? [];
        $data['uuid'] = Str::uuid();
        $data['created_at'] = now();
        $feedbackData[] = $data;
        Storage::put($this->filePath, json_encode($feedbackData));

        // Создайте экземпляр модели или объект данных и верните его
        $feedbackModel = new Feedback(); // модель данных
        $feedbackModel->fill($data); // Заполняем модель данными

        return $feedbackModel;
    }
}
