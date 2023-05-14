<?php

use App\database\DataBaseConnect;
use App\Models\City;
use App\Models\Club;
use App\Models\ClubPlayers;
use App\Models\Player;
use App\Models\Season;
use App\Models\Translation;
use App\Models\TranslationField;
use Carbon\Carbon;
use Faker\Factory;

require_once __DIR__ . '/../vendor/autoload.php';

(new DataBaseConnect())->getConfigOrm();

$faker = Factory::create();

//<editor-fold desc="bubble sort">
$data = array_rand(range(0, 2000, 1), 200);
shuffle($data);
bubble_sort($data);
dd($data);
//</editor-fold>


//<editor-fold desc="Для второе задание">
for ($i = 0; $i < 2; $i++) {
    Season::updateOrCreate([
        'stage' => 'regular',
        'start_date' => Carbon::create('202' . $i,'04', '20'),
        'end_date' => Carbon::create('202' . $i,'05', '20'),
    ]);
}

for ($i = 0; $i < 3; $i++) {
    $city = City::updateOrCreate([
        'name' => $faker->city(),
    ],[
        'lat' => 77.35676,
        'lon' => 72.35676,
    ]);

    $cityTranslations = Translation::updateOrCreate([
        'language' => 'ru',
        'translatable_type' => City::class,
        'translatable_id' => $city->id,
    ], [

    ]);

    TranslationField::updateOrCreate([
        'translation_id' => $cityTranslations->id,
        'field' => 'name',
    ], [
        'translate' => 'Город ' . $faker->numerify('###'),
    ]);

    $club = Club::updateOrCreate([
        'name' => $faker->word() . 'club',
    ],[
        'city_id' => $city->id,
    ]);

    $clubTranslations = Translation::updateOrCreate([
        'language' => 'ru',
        'translatable_type' => Club::class,
        'translatable_id' => $club->id,
    ], [

    ]);

    TranslationField::updateOrCreate([
        'translation_id' => $clubTranslations->id,
        'field' => 'name',
    ], [
        'translate' => 'Клуб ' . $faker->numerify('###'),
    ]);
}

for ($i = 1; $i <= 5; $i++) {
    $player = Player::updateOrCreate([
        'first_name' => 'f_player_' . $i,
        'last_name' => 'l_player_' . $i,
        'second_name' => 's_player_' . $i,
        'number' => $i,
    ],[
        'weight' => $faker->numberBetween(50,100),
        'height' => $faker->numberBetween(168,190),
    ]);

    ClubPlayers::updateOrCreate([
        'player_id' => $player->id,
        'club_id' => rand(1,3),
    ], [
        'season_id' => rand(1,2),
    ]);

    $playerTranslations = Translation::updateOrCreate([
        'language' => 'ru',
        'translatable_type' => Player::class,
        'translatable_id' => $player->id,
    ], [

    ]);

    TranslationField::updateOrCreate([
        'translation_id' => $playerTranslations->id,
        'field' => 'first_name',
    ], [
        'translate' => 'Имя игрока ' . $player->id,
    ]);

    TranslationField::updateOrCreate([
        'translation_id' => $playerTranslations->id,
        'field' => 'last_name',
    ], [
        'translate' => 'Фамилия игрока ' . $player->id,
    ]);

    TranslationField::updateOrCreate([
        'translation_id' => $playerTranslations->id,
        'field' => 'second_name',
    ], [
        'translate' => 'Отчество игрока ' . $player->id,
    ]);
}

$users = Player::with('clubs')->get();
$clubs = Club::with('players')->whereHas('players')->get();
dd($clubs->toArray());
//</editor-fold>

