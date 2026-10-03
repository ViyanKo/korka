<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app".
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property string $start
 * @property string $pament_option
 * @property string $status
 * @property string|null $feedback
 *
 * @property Course $course
 * @property User $user
 */
class App extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback'], 'default', 'value' => null],
            [['pament_option'], 'default', 'value' => 'Наличными'],
            [['status'], 'default', 'value' => 'Новая'],
            [['user_id', 'course_id', 'start'], 'required'],
            [['user_id', 'course_id'], 'integer'],
            [['start'], 'safe'],
            [['pament_option', 'status', 'feedback'], 'string'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'course_id' => 'Course ID',
            'start' => 'Start',
            'pament_option' => 'Pament Option',
            'status' => 'Status',
            'feedback' => 'Feedback',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * PKGH Текст для всплывающего сообщения
     * 
     * @return string
     */
    public function getInfo() 
    {
        return "{$this->user->full_name}:{$this->course->name}, {$this->start} ({$this->status})";
    }

}
