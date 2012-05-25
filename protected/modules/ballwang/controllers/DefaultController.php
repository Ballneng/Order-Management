<?php

class DefaultController extends BallController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}