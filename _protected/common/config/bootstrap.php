<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('upload',  dirname(dirname(dirname(__DIR__))) . '/uploads');
Yii::setAlias('uploads',  dirname(dirname(dirname(__DIR__))) . '/uploads_images');
Yii::setAlias('appRoot', '/'.basename(dirname(dirname(dirname(__DIR__)))));
