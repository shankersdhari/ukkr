<?php
namespace frontend\controllers;
use yii\helpers\Url;
use common\models\User;
use common\models\LoginForm;
use common\models\Staff;
use common\models\Pages;
use common\models\Newsletter;
use common\models\Testimonial;
use common\models\Category;
use common\models\Downloads;
use common\models\Members;
use common\models\Membership;
use common\models\GalleryMain;
use common\models\LatestNews;
use common\models\OurJournals;
use common\models\Attributes;
use common\models\Departments;
use common\models\CourseCategory;
use common\models\Courses;
use frontend\models\AccountActivation;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SearchForm;
use frontend\models\FriendForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Profile;
use common\models\Gallery;
use yii\helpers\Html;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\traits\MessageSendTrait;
use frontend\models\TrackOrder;
use Yii;
use yii\web\Response;
use yii\web\NotFoundHttpException;
/**
 * Site controller.
 * It is responsible for displaying static pages, logging users in and out,
 * sign up and account activation, password reset.
 */
class SiteController extends Controller
{
	
	use MessageSendTrait;
    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
			'eauth' => [
                        // required to disable csrf validation on OpenID requests
                        'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                        'only' => ['login'],
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
     * Declares external actions for the controller.
     *
     * @return array
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

//------------------------------------------------------------------------------------------------//
// STATIC PAGES
//------------------------------------------------------------------------------------------------//

    /**
     * Displays the index (home) page.
     * Use it in case your home page contains static content.
     *
     * @return string
     */
    public function actionIndex()
    {
		$model = new ContactForm();
		$latest_new =  LatestNews::find()->where(['status' => 1])->limit(20)->orderBy(['id' => SORT_DESC])->all();
		$gallery = GalleryMain::findAll(['status' => 1]);
        if ($model->load(Yii::$app->request->post())) 
        {
            if ($model->contact(Yii::$app->params['adminEmail'])) 
            {
                Yii::$app->session->setFlash('success', 
                    'Thank you for contacting us. We will respond to you as soon as possible.');
            } 
            else 
            {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } 
        
        return $this->render('index', [
            'model' => $model,
            'gallery' => $gallery,
            'latest_new' => $latest_new,
        ]);
    }

    /**
     * Displays the about static page.
     *
     * @return string
     */ 
    public function actionAbout()
    {
        return $this->render('about');
    }
	public function actionSociallogin()
    {
        return $this->render('sociallogin');
    }

    /**
     * Displays the contact static page and sends the contact email.
     *
     * @return string|\yii\web\Response
     */
    public function actionContact()
    {

        $model = new ContactForm();
		$this->layout = "simple";
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if ($model->contact(Yii::$app->params['adminEmail'])) 
            {
                Yii::$app->session->setFlash('success', 
                    'Thank you for contacting us. We will respond to you as soon as possible.');
            } 
            else 
            {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } 
        
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

//------------------------------------------------------------------------------------------------//
// LOG IN / LOG OUT / PASSWORD RESET
//------------------------------------------------------------------------------------------------//

    /**
     * Logs in the user if his account is activated,
     * if not, displays appropriate message.
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        // get setting value for 'Login With Email'
        $lwe = Yii::$app->params['lwe'];

        // if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
        $model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

        // now we can try to log in the user
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            return $this->goBack();
        }
        // user couldn't be logged in, because he has not activated his account
        elseif($model->notActivated())
        {
            // if his account is not activated, he will have to activate it first
            Yii::$app->session->setFlash('error', 
                'You have to activate your account first. Please check your email.');

            return $this->refresh();
        }    
        // account is activated, but some other errors have happened
        else
        {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the user.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

/*----------------*
 * PASSWORD RESET *
 *----------------*/

    /**
     * Sends email that contains link for password reset action.
     *
     * @return string|\yii\web\Response
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if ($model->sendEmail()) 
            {
                Yii::$app->session->setFlash('success', 
                    'Check your email for further instructions.');

                return $this->goHome();
            } 
            else 
            {
                Yii::$app->session->setFlash('error', 
                    'Sorry, we are unable to reset password for email provided.');
            }
        }
        else
        {
            return $this->render('requestPasswordResetToken', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Resets password.
     *
     * @param  string $token Password reset token.
     * @return string|\yii\web\Response
     *
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try 
        {
            $model = new ResetPasswordForm($token);
        } 
        catch (InvalidParamException $e) 
        {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) 
            && $model->validate() && $model->resetPassword()) 
        {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }
        else
        {
            return $this->render('resetPassword', [
                'model' => $model,
            ]);
        }       
    }    

//------------------------------------------------------------------------------------------------//
// SIGN UP / ACCOUNT ACTIVATION
//------------------------------------------------------------------------------------------------//

    /**
     * Signs up the user.
     * If user need to activate his account via email, we will display him
     * message with instructions and send him account activation email
     * ( with link containing account activation token ). If activation is not
     * necessary, we will log him in right after sign up process is complete.
     * NOTE: You can decide whether or not activation is necessary,
     * @see config/params.php
     *
     * @return string|\yii\web\Response
     */


    public function actionSignup()
    {
		
		$session = Yii::$app->session;

        // get setting value for 'Registration Needs Activation'
        $rna = Yii::$app->params['rna'];

        // if 'rna' value is 'true', we instantiate SignupForm in 'rna' scenario
        $model = $rna ? new SignupForm(['scenario' => 'rna']) : new SignupForm();

        $profile = new Profile();
        // collect and validate user data
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()))
        {

            $model->status =10;
            // try to save user data in database
            if ($user = $model->signup())
            {
                $profile->user_id = $user->id;
                $profile->save();
				$model->sendWelcomeEmail($user,$profile);
				
                // if user is active he will be logged in automatically ( this will be first user )
                if ($user->status === User::STATUS_ACTIVE)
                {
					//send welcome email 
					
					
					
                    if (Yii::$app->getUser()->login($user))
                    {
                        $session = Yii::$app->session;

                        if (!$session->isActive) {
                            // open a session
                            $session->open();
                        }

                        if (!Yii::$app->user->isGuest) {
                            if ($session->has('cart')) {
                                $carts = $session->get('cart');
                                foreach ($carts as $key => $cart) {

                                    if (($cartmodel = Cart::find()->where(['varient_id' => $key, 'product_id' => $cart['product_id'], 'user_id' => Yii::$app->user->identity->id])->one()) !== null) {
                                        $cartmodel->color = $cart['color'];
                                        $cartmodel->size = $cart['size'];
                                        $cartmodel->width = $cart['width'];
                                        $cartmodel->quantity = $cart['quantity'];
                                        if ($cart['quantity'] > 0)
                                            $cartmodel->save();
                                    } else {
                                        $newmodel = new Cart();
                                        $newmodel->user_id = Yii::$app->user->identity->id;
                                        $newmodel->product_id = $cart['product_id'];
                                        $newmodel->varient_id = $key;
                                        $newmodel->color = $cart['color'];
                                        $newmodel->size = $cart['size'];
                                        $newmodel->width = $cart['width'];
                                        $newmodel->quantity = $cart['quantity'];
                                        if ($cart['quantity'] > 0)
                                            $newmodel->save();
                                    }
                                    unset($carts[$key]);

                                }
                                $session->set('cart', $carts);
                            }

                        }
						$referer = $session->get('last_referer');

						if($referer != Url::to(['cart/cart'],true))
							return $this->redirect(Url::to(['/account'],true));
						else
							return $this->redirect($referer);
                       
                    }
                }
                // activation is needed, use signupWithActivation()
                else
                {
                    $this->signupWithActivation($model, $user);

                    return $this->refresh();
                }
            }
            // user could not be saved in database
            else
            {
                Yii::$app->response->format = Response::FORMAT_JSON;
                echo json_encode(\yii\widgets\ActiveForm::validate($model));
                Yii::$app->end();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    /**
     * Sign up user with activation.
     * User will have to activate his account using activation link that we will
     * send him via email.
     *
     * @param $model
     * @param $user
     */
    private function signupWithActivation($model, $user)
    {
        // try to send account activation email
        if ($model->sendAccountActivationEmail($user)) 
        {
            Yii::$app->session->setFlash('success', 
                'Hello '.Html::encode($user->username).'. 
                To be able to log in, you need to confirm your registration. 
                Please check your email, we have sent you a message.');
        }
        // email could not be sent
        else 
        {
            // display error message to user
            Yii::$app->session->setFlash('error', 
                "We couldn't send you account activation email, please contact us.");

            // log this error, so we can debug possible problem easier.
            Yii::error('Signup failed! 
                User '.Html::encode($user->username).' could not sign up.
                Possible causes: verification email could not be sent.');
        }
    }

/*--------------------*
 * ACCOUNT ACTIVATION *
 *--------------------*/

    /**
     * Activates the user account so he can log in into system.
     *
     * @param  string $token
     * @return \yii\web\Response
     *
     * @throws BadRequestHttpException
     */
    public function actionActivateAccount($token)
    {
        try 
        {
            $user = new AccountActivation($token);
        } 
        catch (InvalidParamException $e) 
        {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($user->activateAccount()) 
        {
            Yii::$app->session->setFlash('success', 
                'Success! You can now log in. 
                Thank you '.Html::encode($user->username).' for joining us!');
        }
        else
        {
            Yii::$app->session->setFlash('error', 
                ''.Html::encode($user->username).' your account could not be activated, 
                please contact us!');
        }

        return $this->redirect('login');
    }
	public function actionTellAFriend(){
		$this->layout="page";
		$model = new FriendForm();
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
			if ($model->contact($model)) 
            {
                return "success";
            } 
            else 
            {
                 return "fail";
            }
        }
		return $this->render('tell-a-friend', [
                'model' => $model,
        ]);
	}
	public function actionPage($slug){
		//$this->layout="page";

		$page = Pages::find()->where(['slug' =>$slug ])->one();
		$model1 = new ContactForm();

        if ($model1->load(Yii::$app->request->post()))
        {

            if ($model1->contact(Yii::$app->params['adminEmail']))
            {
                Yii::$app->session->setFlash('success',
                    'Thank you for contacting us. We will respond to you as soon as possible.');
            }
            else
            {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        }
		if($page){
			return $this->render('page', [
                'model' => $page,
            ]);
		}else{
			 throw new NotFoundHttpException('The requested page does not exist.');
		}

	}
    public function actionStaff($department = 0){
        //$this->layout="page";
        if($department){
            $sub_department = Departments::find()->where(['status' =>1 ,'deprt' => $department])->all();
        }else{
            $sub_department = Departments::find()->where(['status' =>1 ,'deprt' => "Staff"])->all();
        }
        return $this->render('staff', [
            'department' => $department,
            'sub_department' => $sub_department,
        ]);

    }
    public function actionCourses(){
        //$this->layout="page";
        $courses_category = CourseCategory::find()->where(['status' =>1 ])->all();
        return $this->render('courses', [
            'courses_category' => $courses_category,
        ]);

    }
    public function actionDownloads(){
        //$this->layout="page";
        $downloads = Downloads::find()->where(['status' =>1 ])->all();
        return $this->render('downloads', [
            'downloads' => $downloads,
        ]);

    }
	public function actionMembership(){
		
		$member =  Membership::find()->where(['status' => 1])->limit(4)->orderBy(['id' => SORT_ASC])->all();
		return $this->render('membership', [
			'members' => $member,
		]);	
		
		
	}
	public function actionCheckout($id=0){
		$rna = Yii::$app->params['rna'];
		$model = $rna ? new SignupForm(['scenario' => 'rna']) : new SignupForm();
		if($id){
			$member =  Membership::find()->where(['id' => $id])->one();
			if(!Yii::$app->user->isGuest){
				$user = User::findOne(['id' => Yii::$app->user->identity->id]);
				$profile = Profile::findOne(['user_id' => $user->id]);
				$profile->membership = $id;
				$model->email = $user->email;
			}else{
				$user =  new User();
				$profile =  new Profile();	
			}
		}else{
			return $this->redirect('index');
		}
		if(Yii::$app->request->post()){
			if($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())){
				$use = User::findOne(['email' => $model->email]);
				if($use){
					$user = $use;
					$profile = Profile::findOne(['user_id' => $user->id]);
					$profile->membership = $id;
				}else{
					$model->username =$model->email;
					$model->status =10;
					$model->password = rand(100000, 1000000);
					if ($user = $model->signup())
					{
						$profile->user_id = $user->id;
						$profile->membership = $id;
						$profile->save();
						//$model->sendWelcomeEmail($user,$profile);
					}
				}
				
				return $this->render('payu',[ 
					'profile' => $profile,
					'user' => $user,
					'member' => $member,
				]);
			}
		}
		return $this->render('checkout', [
			'members' => $member,
			'profile' => $profile,
			'model' => $model,
		]);	
		
		
	}
	
    /**
     * Displays the about gallery page.
     *
     * @return string
     */ 
    public function actionGallery()
    {
        return $this->render('gallery');
    }	
		
}
