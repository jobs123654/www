<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Cookie;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Employ;
// use Symfony\Component\BrowserKit\Cookie;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
	public $layout='common';
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
    /*  */
    /**
     * Login action.
     *
     * @return Response|string
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
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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
    /*
     * 
     *  ����
     *   */
    public  function actionExample()
    {
//     	$this->redirect('http://www.baidu.com');
    	$request=YII::$app->request;
    	if($request->isGet)
    	{
    		echo  $request->get('dog');
    	}
    	$response=YII::$app->response;
    	
//     	$response->headers->add('location','http://www.baidu.com'); ==��ת =$this->redirect(url)
//     	$response->headers->add('content-disposition', 'attachment;filename="a.jpg"'); //ͼ������
//      $response->sendFile('./robots.txt');//�ļ�����
          /* �Ự */
    	$session=YII::$app->session;//session ���Ŀ¼��php.ini ��savePath
    	$session->open();
    	if($session->isActive)
    	{
    		echo 'the session is active';
    	}
    	$session->set('user','pig');//���� $sesson['user']='pig'
    	$session->remove('user');   //ɾ�� unset($session['user'])
    	echo $session->get('user');//
    	/* ��Ӧ cookie*/
    	$cookie=YII::$app->response->cookies;
    	$c=array('name'=>'helo','value'=>'world');
    	$cookie->add(new Cookie($c));
//     	$cookie->remove('helo');//ɾ��cookie
//     ��ȡcookie
         $rc=YII::$app->request->cookies;
         echo  $rc->getValue('helo');
//     	return $this->render('example');
    }
    /*��ͼ--��������  */
    public  function  actionView()
    {
    	$data=array('name'=>'helo<script>alert();</script>');
    	$data1=array(1,3);
    	$view['data']=$data1;
    	return $this->renderPartial('view',$data);
//       return $this->render('view');
    }
    public  function actionLayout()
    {
    	$d=new Employ();
//     	$r=Employ::find()->where(['Id'=>1])->all();
//          $r=Employ::find()->where(['>','Id',9])->all();
//         $r=Employ::find()->where(['between','Id',1,3])->asArray()->all(); //id>=1&&id<=3
//           $r=Employ::find()->where(['like','uname','s'])->all();
             /*������ѯ  */
    	foreach (Employ::find()->batch(5) as $item)
    	{
    		print_r(count($item));
    	}
    	
//     	print_r( Employ::findBySql('select * from employ')->all());
//     	return $this->render('layout');
    }
    /*�����ѯ  */
    public  function actionDb()
    {
    	$e=new Employ();
//     	$result=$e->find()->where(['Id'=>1])->all();
//     	$result[0]->delete();
//          Employ::deleteAll('Id>0');//����ɾ��
//          �������
        $e->uname='陈兴安';
        $e->aId='sss';
        $e->validate();
        if($e->hasErrors())
        {
        	echo '数据不合法';
        	exit;
        }
        $e->save();
    }
}
