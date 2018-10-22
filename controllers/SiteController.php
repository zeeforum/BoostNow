<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\AdminLoginForm;
use app\models\ContactForm;
use app\models\NewUsers;

class SiteController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		return $this->render('index');
	}

	/**
	 * Login action.
	 *
	 * @return string
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Admin Login action.
	 *
	 * @return string
	 */
	public function actionAdminLogin()
	{
		if (!Yii::$app->admin->isGuest) {
			return $this->goHome();
		}

		$model = new AdminLoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Logout action.
	 *
	 * @return string
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}

	public function actionDetail() {
		return $this->render('detail');
	}

	public function actionRegistration() {
		$mRegistration = new \app\models\RegistrationForm();

		if ($mRegistration->load(Yii::$app->request->post()) && $mRegistration->validate()) {
			echo 'YES';
			exit();
		}

		return $this->render('registration', ['model' => $mRegistration]);
	}

	public function actionAdHocValidation() {
		$model = \yii\base\DynamicModel::validateData([
			'username' => 'John',
			'email' => 'john@gmail.com'
		], [
			[['username', 'email'], 'string', 'max' => 12],
			['email', 'email'],
		]);
			
		if ($model->hasErrors()) {
			var_dump($model->errors);
		} else {
			echo "success";
		}
	}

	public function actionShowFlash() {
		$session = Yii::$app->session;
		$session->setFlash('greeting', 'Hello user!');

		return $this->render('showflash');
	}

	public function actionSendCookies() {
		$cookies = Yii::$app->response->cookies;
		$cookies->add(new \yii\web\Cookie([
			'name'  => 'language',
			'value' => 'en',
		]));

		$cookies->add(new \yii\web\Cookie([
			'name'  => 'username',
			'value' => 'John',
		]));

		$cookies->add(new \yii\web\Cookie([
			'name'  => 'country',
			'value' => 'USA',
		]));
	}

	public function actionReadCookies() {
		$cookies = Yii::$app->request->cookies;
		//if cookie does not exist return default value 'en'
		$language = $cookies->getValue('language', 'en');

		//alternative way
		/*if (($cookie = $cookies->get('language')) !== null) {
			$language = $cookie->value;
		}*/

		//use cookies as array
		/*if (isset($cookies['language'])) {
			$language = $cookies['language']->value;
		}*/

		//check if language cookie exist
		if ($cookies->has('language') || $language !== null)
			echo "Current Language: " . $language;
	}

	public function actionUploadImage() {
		$model = new \app\models\UploadImageForm();

		if (Yii::$app->request->isPost) {
			$model->image = \yii\web\UploadedFile::getInstance($model, 'image');

			if ($model->upload()) {
				//file uploaded successfully
				echo 'File Uploaded';
				return;
			}
		}

		return $this->render('upload', ['model' => $model]);
	}

	public function actionFormatter() {
		return $this->render('formatter');
	}

	public function actionPagination() {
		$query = \app\models\NewUsers::find();

		//total no. of rows
		$count = $query->count();

		//create pagination
		$pagination = new \yii\data\Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

		//limit the pagination result
		$models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

		return $this->render('pagination', ['models' => $models, 'pagination' => $pagination]);
	}

	public function actionSorting() {
		//declaring the sort object
		$sort = new \yii\data\Sort([
			'attributes' => [
				'id',
				'name',
				'email'
			],
		]);

		$models = \app\models\NewUsers::find()
				->orderBy($sort->orders)
				->all();

		return $this->render('sorting', [
			'models' => $models,
			'sort' => $sort,
		]);
	}

	public function actionProperties() {
		$object = new \app\components\Phone();

		$phone = $object->phone;
		var_dump($phone);

		$object->phone = '+923157429390';

		//$phone = $object->phone;
		var_dump($object);
	}

	public function actionDataProvider() {
		//Using ArrayDataProvider
		$data = \app\models\NewUsers::find()->asArray()->all();

		$provider = new \yii\data\ArrayDataProvider([
			'allModels' => $data,
			'pagination' => [
				'pageSize' => 3,
			],

			'sort' => [
				'attributes' => ['id', 'name'],
			],
		]);

		$users = $provider->getModels();
		var_dump($users);

		//Using SQL Data Provider
		/*$count = Yii::$app->db->createCommand('select count(*) from new_users')->queryScalar();

		$provider = new \yii\data\SqlDataProvider([
			'sql' => 'select * from new_users',
			'totalCount' => $count,
			'pagination' => [
				'pageSize' => 5,
			],
			'sort' => [
				'attributes' => [
					'id',
					'name',
					'email',
				],
			],
		]);

		$users = $provider->getModels();
		var_dump($users);*/


		//Using ActiveDataProvider
		/*$query = \app\models\NewUsers::find();

		$provider = new \yii\data\ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 2,
			],
		]);

		$users = $provider->getModels();
		var_dump($users);*/
	}

	public function actionDataWidget() {
		//list view or gird view
		$dataProvider = new \yii\data\ActiveDataProvider([
			'query' => \app\models\NewUsers::find(),
			'pagination' => [
				'pageSize' => 5,
			],
		]);

		return $this->render('datawidget', ['dataProvider' => $dataProvider]);

		//detail view
		/*$model = \app\models\NewUsers::find()->one();
		return $this->render('datawidget', [
			'model' => $model
		]);*/
	}

	public function actionTestEvent() {
		$model = new \app\models\NewUsers();
		$model->name = 'Zartash Zulfiqar';
		$model->email = 'zartashzulfiqar@gmail.com';
		if ($model->save()) {
			$model->trigger(\app\models\NewUsers::NEW_USER_EVENT);
		}
	}

	public function actionTestBehavior() {
		//creating a new user
		$model = new \app\models\NewUsers();
		$model->name = "john";
		$model->email = "john@gmail.com";
		if ($model->save()) {
			var_dump(\app\models\NewUsers::find()->asArray()->all());
		}
	}

	public function actionTestInterface() {
		$container= new \yii\di\Container();
		$container->set("\app\components\MyInterface","\app\components\First");
		$obj = $container->get("\app\components\MyInterface");
		$obj->test(); // print "First class"
		$container->set("\app\components\MyInterface","\app\components\Second");
		$obj = $container->get("\app\components\MyInterface");
		$obj->test(); // print "Second class"
	}

	public function actionTestDb() {

		//Active Records
		//$users = NewUsers::findOne(1);
		$users = NewUsers::findAll([1,2,5]);
		var_dump($users);


		/*$single_user = NewUsers::find()->where(['id' => 1])->one();
		var_dump($single_user);

		$user_count = NewUsers::find()->count();
		var_dump($user_count);

		$users = NewUsers::find()->orderBy('id')->all();
		var_dump($users);*/

		//Query Command
		/*// return a set of rows. each row is an associative array of column names and values.
		// an empty array is returned if the query returned no results
		$users = Yii::$app->db->createCommand('SELECT * FROM new_users LIMIT 5')->queryAll();
		var_dump($users);
		// return a single row (the first row)
		// false is returned if the query has no result
		$user = Yii::$app->db->createCommand('SELECT * FROM new_users WHERE id=1')->queryOne();
		var_dump($user);
		// return a single column (the first column)
		// an empty array is returned if the query returned no results
		$userName = Yii::$app->db->createCommand('SELECT name FROM new_users')->queryColumn();
		var_dump($userName);
		// return a scalar value
		// false is returned if the query has no result
		$count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM new_users')->queryScalar();
		var_dump($count);*/
	}
}