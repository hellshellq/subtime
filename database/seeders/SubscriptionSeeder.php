<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $subscriptions = [
            [
                'name' => 'YouTube Premium',
                'description' => 'Смотрите видео без рекламы и скачивайте их для офлайн просмотра',
                'price' => 299.00,
                'duration' => 1,
                'features' => [
                    'Просмотр без рекламы',
                    'Скачивание видео',
                    'Фоновая работа',
                    'YouTube Music Premium'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/youtube.svg',
            ],
            [
                'name' => 'Spotify Premium',
                'description' => 'Слушайте музыку без рекламы и в высоком качестве',
                'price' => 199.00,
                'duration' => 1,
                'features' => [
                    'Прослушивание без рекламы',
                    'Высокое качество звука',
                    'Скачивание музыки',
                    'Офлайн режим'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/spotify.svg',
            ],
            [
                'name' => 'VK Music',
                'description' => 'Доступ к миллионам треков и возможность скачивать их',
                'price' => 149.00,
                'duration' => 1,
                'features' => [
                    'Безлимитное прослушивание',
                    'Скачивание треков',
                    'Высокое качество',
                    'Нет рекламы'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/vk.svg',
            ],
            [
                'name' => 'Netflix',
                'description' => 'Смотрите фильмы и сериалы онлайн в высоком качестве',
                'price' => 899.00,
                'duration' => 1,
                'features' => [
                    'Доступ к эксклюзивному контенту',
                    '4K и HDR',
                    'Много устройств',
                    'Офлайн просмотр'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/netflix.svg',
            ],
            [
                'name' => 'Apple Music',
                'description' => 'Музыкальный стриминг от Apple',
                'price' => 169.00,
                'duration' => 1,
                'features' => [
                    '70+ млн треков',
                    'Офлайн режим',
                    'Синхронизация с iCloud',
                    'Эксклюзивные релизы'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/applemusic.svg',
            ],
            [
                'name' => 'Яндекс.Плюс',
                'description' => 'Подписка на сервисы Яндекса: Музыка, Кинопоиск, Диск и др.',
                'price' => 299.00,
                'duration' => 1,
                'features' => [
                    'Яндекс.Музыка',
                    'Кинопоиск HD',
                    'Скидки на такси',
                    'Бонусы в сервисах Яндекса'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/yandex.svg',
            ],
            [
                'name' => 'IVI',
                'description' => 'Онлайн-кинотеатр с фильмами и сериалами',
                'price' => 399.00,
                'duration' => 1,
                'features' => [
                    'Большой выбор фильмов',
                    'Сериалы и мультфильмы',
                    '4K и HDR',
                    'Офлайн просмотр'
                ],
                'is_active' => true,
                'icon_url' => '/icons/ivi.svg',
            ],
            [
                'name' => 'Adobe Creative Cloud',
                'description' => 'Пакет профессиональных программ для творчества',
                'price' => 2999.00,
                'duration' => 1,
                'features' => [
                    'Photoshop, Illustrator, Premiere Pro',
                    'Облачное хранилище',
                    'Доступ с разных устройств',
                    'Постоянные обновления'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/adobe.svg',
            ],
            [
                'name' => 'Xbox Game Pass',
                'description' => 'Доступ к сотням игр на Xbox и ПК',
                'price' => 599.00,
                'duration' => 1,
                'features' => [
                    'Игры для Xbox и ПК',
                    'Новые релизы сразу',
                    'EA Play включён',
                    'Скидки для подписчиков'
                ],
                'is_active' => true,
                'icon_url' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/xbox.svg',
            ],
        ];

        foreach ($subscriptions as $subscription) {
            Subscription::updateOrCreate(
                ['name' => $subscription['name']],
                $subscription
            );
        }
    }
} 