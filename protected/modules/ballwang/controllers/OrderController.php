<?php

class OrderController extends BallController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'SynOrder'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Order;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->order_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->order_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Order');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * 
     */
    public function actionSynOrder() {
        $allDb = $this->getDbOrderConnection();
        if ($allDb['all']) {
            foreach ($allDb['all'] as $key => $value) {
                $this->getOrder($value);
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function getDbOrderConnection($all = true, $siteId = 0) {
        $dbconnect = array('all' => 0, 'single' => 0);
        if ($all) {
            $site = Site::model()->findAll();
            $dbconnect['all'] = $site;
        } else {
            if ($siteId) {
                $site = Site::model()->findByPk($siteId);
                $dbconnect['single'] = $site;
            }
        }
        return $dbconnect;
    }

    protected function getOrder($db) {
        $dbConnectString = '';
        $row = '';
        $dbConnect = mysql_connect($db->site_db_host, $db->site_db_name, $db->site_db_password);

        if (!$dbConnect) {
            $dbConnectString .= $db->site_db_name . 'connect failed!';
        } else {
            mysql_select_db($db->site_db_name, $dbConnect) or die('Query interrupted' . mysql_error());
            mysql_query("SET NAME 'UTF8'");
            $sql = "select t1.*,t2.*,t3.*,t4.carrier_name,t4.carrier_id,t5.response_txn_id
                from syo_order AS t1
                LEFT JOIN  syo_customer_address  AS t2 ON t1.order_address_id=t2.address_id
                LEFT JOIN syo_customer AS t3 ON t1.customer_id=t3.customer_id
                LEFT JOIN syo_carrier AS t4 ON t1.order_carrier_id=t4.carrier_id
                LEFT JOIN syo_paypal_response AS t5 ON t1.order_id=t5.order_id
                WHERE t1.order_valid=1 AND  (t1.order_status=" . Order::PaymentAccepted . " OR t1.order_status=" . Order::Shipped . " ) AND t1.order_export=0
                ORDER BY order_payment_at ASC";
            $query = mysql_query($sql);
            while ($row = mysql_fetch_array($query)) {
                var_dump($row['address_city']);
                echo '<br></br>';
            }
            echo $dbConnectString . '######';
        }

        mysql_close($dbConnect);
    }

    /**
     * 同步订单
     * @param type $row
     * @param type $type 
     */
    protected function setSynOrderList($row, $type='syo', $db) {
        
    }

    protected function synOrderListUpdate($row, $db) {
        $error = '';
        $success ='';
        $isOrder = Order::model()->findByAttributes(array('order_site_id' => $db->site_id, 'invoice_id' => $row['invoice_id']));
        if ($isOrder) {
            $order = $isOrder;
        } else {
            $order = new Order();
        }
        $order->order_site_id = $db->site_id;
        $order->invoice_id = $row['invoice_id'];
        $custmerId = (int) $row['customer_id'];

        $userAndAddress=  $this->setUser($row, $db);
        $order->customer_id = $userAndAddress['userId'];                                //change
        $order->order_subtotal = $row['order_subtotal'];
        $order->order_trackingtotal = $row['order_trackingtotal'];
        $order->order_promo_free = $row['order_promo_free'];
        $order->order_grandtotal = $row['order_grandtotal'];
        $order->order_discount_id = $row['order_discount_id'];
        $order->order_currency_id = $row['order_currency_id'];
        $order->order_currency_id = $row['order_currency_id'];
        $order->order_carrier_id = $row['order_carrier_id'];                      //change
        $order->order_address_id = $userAndAddress['addressId'];                      //change
        $order->order_status = $row['order_status'];
        $order->order_valid = $row['order_valid'];
        $order->order_export = $row['order_export'];
        $order->order_qty = $row['order_qty'];
        $order->order_ip = $row['order_ip'];
        $order->order_salt = $row['order_salt'];
        $order->order_comment = $row['order_comment'];
        $order->order_create_at = $row['order_create_at'];
        $order->order_payment_at = $row['order_payment_at'];
        if ($order->save()) {
            
        } else {
            $error .=$db->site_prefix . $row['invoice_id'] . '订单同步失败！';
        }
    }

    /**
     *用户账号和地址信息录入
     * @param type $row
     * @param type $db
     * @return array() 返回为数组附带用户ID，地址ID，成功信息，失败信息 
     */
    protected function setUser($row, $db) {
        $isAddressExist = 0;
        $addressReturnId = 0;
        $error = '';
        $success = '';
        $userId = 0;
        $return = array();
        $user = Customer::model()->findByAttributes(array('customer_email' => $row['customer_email']));
        if ($user) {
            //如有变动则更新
            $userString = md5($user->customer_name . $user->customer_active . $user->customer_role . $user->customer_default_address . $user->customer_group . $user->customer_visit_count);
            $rowUserString = md5($row['customer_name'] . $row['customer_active'] . $row['customer_role'] . $row['customer_default_address'] . $row['customer_group'] . $row['customer_visit_count']);
            if ($userString != $rowUserString) {
                $user->customer_name = $row['customer_name'];
                $user->customer_active = $row['customer_active'];
                $user->customer_role = $row['customer_role'];
                $user->customer_default_address = $row['customer_default_address'];
                $user->customer_group = $row['customer_group'];
                $user->customer_visit_count = $row['customer_visit_count'];
                if ($user->update()) {
                    $success .= $db->site_prefix . $user->customer_name . '用户信息更新成功！';
                }
            }
            //检查地址是否存在
            $address = $user->address;
            foreach ($address as $key => $value) {
                if ($value->customer_firstname == $row['customer_firstname'] && $value->customer_lastname == $row['customer_lastname'] && $value->customer_name == $row['customer_name'] && $value->address_street == $row['address_street'] && $value->address_city == $row['address_city'] && $value->address_state == $row['address_state'] && $value->address_country == $row['address_country']) {
                    $addressReturnId = $value->address_id;
                    $isAddressExist = 1;
                }
            }
            if (!$isAddressExist) {
                $address = new CustomerAddress();
                $address->customer_id = $user->customer_id;
                $address->customer_gender = $row['customer_gender'];
                $address->customer_firstname = $row['customer_firstname'];
                $address->customer_lastname = $row['customer_lastname'];
                $address->address_company = $row['address_company'];
                $address->address_street = $row['address_street'];
                $address->address_city = $row['address_city'];
                $address->address_state = $row['address_state'];
                $address->address_country = $row['address_country'];
                $address->address_postcode = $row['address_postcode'];
                $address->address_phonenumber = $row['address_phonenumber'];
                $address->address_create_at = $row['address_create_at'];
                if ($address->save()) {
                    $addressReturnId = $address->address_id;
                } else {
                    $error .=$db->site_prefix . $row['customer_name'] . ' 存在账号但地址保存失败！<br>';
                }
            }
        } else {
            $user = new Customer();
            $user->customer_email = $row['customer_email'];
            $user->customer_name = $row['customer_name'];
            $user->customer_pwd = $row['customer_pwd'];
            $user->customer_newsletter = $row['customer_newsletter'];
            $user->customer_active = $row['customer_active'];
            $user->customer_role = $row['customer_role'];
            $user->customer_default_address = $row['customer_default_address'];
            $user->customer_group = $row['customer_group'];
            $user->customer_ip = $row['customer_ip'];
            $user->customer_login = $row['customer_login'];
            $user->customer_visit_count = $row['customer_visit_count'];
            $user->customer_last_update = $row['customer_last_update'];
            $user->customer_create_at = $row['customer_create_at'];
            if ($user->save()) {
                $address = new CustomerAddress();
                $address->customer_id = $user->customer_id;
                $address->customer_gender = $row['customer_gender'];
                $address->customer_firstname = $row['customer_firstname'];
                $address->customer_lastname = $row['customer_lastname'];
                $address->address_company = $row['address_company'];
                $address->address_street = $row['address_street'];
                $address->address_city = $row['address_city'];
                $address->address_state = $row['address_state'];
                $address->address_country = $row['address_country'];
                $address->address_postcode = $row['address_postcode'];
                $address->address_phonenumber = $row['address_phonenumber'];
                $address->address_create_at = $row['address_create_at'];
                if ($address->save()) {
                    $addressReturnId = $address->address_id;
                } else {
                    $error .=$db->site_prefix . $row['customer_name'] . ' 地址保存失败！<br>';
                }
            } else {
                $error .= $db->site_prefix . $row['customer_email'] . '账号保存失败！<br>';
            }
        }
        $return['success'] = $success;
        $return['error'] = $error;
        $return['addressId'] = $addressReturnId;
        $return['userId'] = $userId;
        return $return;
    }

}
