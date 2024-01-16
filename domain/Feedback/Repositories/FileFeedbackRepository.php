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

    public function getAll() {
        // Получаем данные обратной связи из файла
        $feedbackData = Storage::get($this->filePath);

        // Декодируем данные из JSON в массив или создаем пустой массив, если данные отсутствуют
        $feedbackData = json_decode($feedbackData, true) ?? [];

        // Создаем коллекцию моделей на основе массива данных
        $feedbackCollection = collect($feedbackData);

        // Массив для хранения экземпляров моделей Feedback
        $feedbackModels = [];

        // Размер чанка для обработки коллекции данных
        $chunkSize = 100;

        // Разбиваем коллекцию данных на чанки и обрабатываем их
        $chunks = $feedbackCollection->chunk($chunkSize);

        foreach ($chunks as $chunk) {
            foreach ($chunk as $item) {
                // Создаем экземпляр модели Feedback и добавляем его в массив
                $feedbackModels[] = new Feedback($item);
            }
        }

        // Возвращаем массив экземпляров моделей Feedback
        return $feedbackModels;
    }
}
