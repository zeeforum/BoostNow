<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row no-gutter">
    <div class="page-title text-center">
        <h1 class="contact"><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="contact-page">
        <div class="col-xs-12 col-sm-6">
            <div class="address-info">
                <p class="phone">
                    <span class="fa fa-phone"></span>&nbsp;&nbsp;+923117360671
                </p>
                <p class="website">
                    <span class="fa fa-globe"></span>&nbsp;&nbsp;<a href="https://zartash.us/">Zartash.us</a>
                </p>
                <p class="email">
                    <span class="fa fa-envelope"></span>&nbsp;&nbsp;<a href="mailto:contact@zartash.us">contact@zartash.us</a>
                </p>
                <p class="address">
                    <span class="fa fa-map-marker"></span>&nbsp;&nbsp;&nbsp;House#75 Street S Block Z NST Sargodha
                </p>

                <div class="google-map">
                    <div style="width: 100%"><iframe width="100%" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=tree%20solutions%20sargodha+(Tree%20Solutions)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Create Google Map</a></iframe></div><br />
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="site-contact">
                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success">
                        Thank you for contacting us. We will respond to you as soon as possible.
                    </div>

                    <p>
                        Note that if you turn on the Yii debugger, you should be able
                        to view the mail message on the mail panel of the debugger.
                        <?php if (Yii::$app->mailer->useFileTransport): ?>
                            Because the application is in development mode, the email is not sent but saved as
                            a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                            Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                            application component to be false to enable email sending.
                        <?php endif; ?>
                    </p>

                <?php else: ?>

                    <p>
                        If you have business inquiries or other questions, please fill out the following form to contact us.
                        Thank you.
                    </p>

                    <div class="contact-form row no-gutter">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                            <div class="col-xs-12 col-sm-6 first">
                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                            </div>

                            <div class="col-xs-12 col-sm-6 last">
                                <?= $form->field($model, 'email') ?>
                            </div>

                            <div class="col-xs-12 col-sm-12 no-gutter">
                                <?= $form->field($model, 'subject') ?>
                            </div>

                            <div class="col-xs-12 col-sm-12 no-gutter">
                                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                            </div>

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="col-xs-12 col-lg-6 first">{input}</div><div class="col-xs-12 col-sm-6 last">{image}</div>',
                            ]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-boostnow', 'name' => 'contact-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>