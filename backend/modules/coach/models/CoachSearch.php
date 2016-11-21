<?php

namespace backend\modules\coach\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Coach;
use common\widgets\datepicker\DatePicker;
/**
 * CoachSearch represents the model behind the search form about `common\models\Coach`.
 */
class CoachSearch extends Coach
{
    public $create_time_end;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'display', 'start_time', 'end_time', 'join_cost', 'update_time'], 'integer'],
            [['title', 'img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * 继承方法
     * (non-PHPdoc)
     */
     public function attributeLabels()
     {
         $data = parent::attributeLabels();
         $data['create_time_end']= '至';
         return $data;
     }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Coach::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         //排序
        $query->orderBy('create_time desc');

        DatePicker::strToTime($this, $params, ['create_time','create_time_end']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['=', 'type', $this->type])
            ->andFilterWhere(['=', 'display', $this->display])
            ->andFilterWhere(['>=', 'create_time', $this->create_time])
            ->andFilterWhere(['<=', 'create_time', $this->create_time_end]);

        return $dataProvider;
    }
}
