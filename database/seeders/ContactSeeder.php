<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            Contact::TYPE_PHONE     => '+7(705)977-74-97',
            Contact::TYPE_WHATSAPP  => '+77059777497',
            Contact::TYPE_EMAIL     => 'ainelek1@mail.ru',
            Contact::TYPE_INSTAGRAM => 'https://www.instagram.com/sadik_ainelek_taraz/',
            Contact::TYPE_ADDRESS => 'Тараз қаласы, Төле би даңғылы, 74/1',
            Contact::TYPE_MAP => '<a class="dg-widget-link" href="http://2gis.kz/taraz/firm/70000001051555323/center/71.35356187820436,42.90267473978739/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Тараза</a><div class="dg-widget-link"><a href="http://2gis.kz/taraz/firm/70000001051555323/photos/70000001051555323/center/71.35356187820436,42.90267473978739/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div><div class="dg-widget-link"><a href="http://2gis.kz/taraz/center/71.353561,42.902379/zoom/16/routeTab/rsType/bus/to/71.353561,42.902379╎Айнелёк, частный детский сад?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Айнелёк, частный детский сад</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":640,"height":600,"borderColor":"#a3a3a3","pos":{"lat":42.90267473978739,"lon":71.35356187820436,"zoom":16},"opt":{"city":"taraz"},"org":[{"id":"70000001051555323"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>',
        ];

        foreach ($contacts as $key => $value) {
            if (!Contact::query()->where('type_id', $key)->exists()) {
                Contact::query()->create([
                    'type_id' => $key,
                    'content' => $value,
                ]);
            }
        }
    }
}
