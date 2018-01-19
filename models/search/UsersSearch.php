<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch представляет собой модель для поиска в `app\models\Users`.
 */
class UsersSearch extends Users {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'status'], 'integer'],
            [['login', 'password', 'role'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // передача scenarios() из родительского класса
        return Model::scenarios();
    }

    /**
     * Создает data provider и строку запроса к нему
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Users::find();

        // TODO добавить все условия для поиска здесь

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Раскоментируйте эту строчку, если хотите не получить ни одной строчки в случае неудачи
            // $query->where('0=1');
            return $dataProvider;
        }

        // условия для сетки
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }
}
