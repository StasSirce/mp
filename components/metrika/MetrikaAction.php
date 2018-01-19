<?php



namespace app\components\metrika;
use yii\base\Action;

class MetrikaAction extends Action {


    public $token;
    public $counter;
    private $dateFrom;
    public $dateFormat = "d.m.Y";
    private $dateTo;
    private $url = "https://api-metrika.yandex.ru/stat/traffic/summary.json?";

    public function init() {
        $this->dateFrom = date("Ymd", strtotime("-1 week"));
        $this->dateTo = date("Ymd");
    }

    public function run($dateFrom = null, $dateTo = null) {

        // Параметры, с которыми будет обращаться к Яндексу
        $params = [
            "oauth_token" => $this->token,
            "id" => $this->counter,
            "date1" => $dateFrom? $this->dateToYandexFormat($dateFrom) : $this->dateFrom,
            "date2" => $dateTo? $this->dateToYandexFormat($dateTo) : $this->dateTo,
            "group" => "day"
        ];
        $this->dateFrom = $dateFrom? $this->dateToYandexFormat($dateFrom) : $this->dateFrom;
        $this->dateTo = $dateTo? $this->dateToYandexFormat($dateTo) : $this->dateTo;

        $data = $this->request($params);
        if (!empty($data->errors)) {
            return json_encode($data->errors[0], JSON_UNESCAPED_UNICODE);
        }

        $visits = $this->parseVisits($data);

        return json_encode($visits);

    }

    // Осуществляет запрос к API Yandex
    private function request($params) {

        $curl = curl_init($this->url.http_build_query($params));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);

        $data = json_decode(curl_exec($curl));
        curl_close($curl);
        return $data;
    }

    // Добавлет пропущеет даты, ибо Яндекс не отдает их, по какой-то причине
    private function addEmptyDates($visits) {
        $dateStart = \DateTime::createFromFormat('Ymd', $this->dateFrom);
        $dateFinish = \DateTime::createFromFormat('Ymd', $this->dateTo);
        $dateStart = $dateStart->format("d.m.Y");
        $dateFinish = $dateFinish->format("d.m.Y");

        while (strtotime($dateStart) <= strtotime($dateFinish)) {
            if (empty($visits[$dateStart])) {
                $result[$dateStart] = 0;
            } else {
                $result[$dateStart] = $visits[$dateStart];
            }

            $dateStart = date("d.m.Y", strtotime("+1 day", strtotime($dateStart)));
        }

        uksort($result, function($a, $b) {
            return strtotime($a) > strtotime($b);
        });


        return $result;
    }

    // Парсит данные из того, что отдает Yandex
    private function parseVisits($data) {
        $visits = [];
        foreach ($data->data as $item) {
            $visits[$item->date] = $item->visits;
        }

        $visits = $this->formatDates($visits, $this->dateFormat);
        $visits = $this->addEmptyDates($visits);
        return $visits;
    }

    // Приводит даты к нормальному формату
    private function formatDates($visits, $format = "d.m.Y") {

        $result = [];
        foreach($visits as $date => $value) {
            $date = \DateTime::createFromFormat('Ymd', $date);
            $result[$date->format($format)] = $value;
        }
        return $result;
    }

    private function dateToYandexFormat($date) {
        $date = \DateTime::createFromFormat('d.m.Y', $date);
        return $date->format("Ymd");
    }


}