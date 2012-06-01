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
 
        $model = $this->_load_model();
        if (!$ship = OrderShip::model()->findByAttributes(array('ship_order_id' => $model->order_id))) {
            $ship = new OrderShip();
        }

        if (isset($_POST['Order'])) {
            $model->order_status = $_POST['Order']['order_status'];
            if ($model->order_status == Order::Shipped) {
                $day = Config::item('ship', 'cycle');
                $ship->ship_order_id = $model->order_id;
                $ship->ship_start_at = date('Y-m-d H:i:s');
                $ship->ship_end_at = date('Y-m-d H:i:s', strtotime("+$day day"));
                $ship->ship_from = 'China';
                $ship->ship_to = $model->order_address_id;
                $ship->ship_code = str_replace(' ', '', $_POST['OrderShip']['ship_code']);

                if ($ship->save()) {
                    $model->order_ship_id = $ship->ship_id;
                }
            }

            if ($model->order_status == Order::PaymentAccepted) {
                $model->order_export = 0;
            }

            $model->save(false);

            if (!$history = OrderHistory::model()->findByAttributes(array('history_order_id' => $model->order_id))) {
                $history = new OrderHistory();
            }
            $history->history_employee_id = Yii::app()->user->id;
            $history->history_order_id = $model->order_id;
            $history->history_state = $model->order_status;
            $history->history_create = new CDbExpression("NOW()");
            $history->save();
            $history->informEmail($model->customer_id);
        }

        $script = "$('#order_status').change(function(){
                     if($(this).val()==3){
                         $('#ship_code').show();
                      }else{
                          $('#ship_code').hide();
                      }
                 });";
        Yii::app()->clientScript->registerScript('ship_code', $script, CClientScript::POS_READY);
        $this->render('view', array('model' => $model, 'ship' => $ship));
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
        $this->redirect('/ballwang/order/admin');
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
        // $dbConnect = mysql_connect('localhost', 'root', '');
        if (!$dbConnect) {
            $dbConnectString .= $db->site_db_name . 'connect failed!';
        } else {
            mysql_select_db($db->site_db_name, $dbConnect) or die('Query interrupted' . mysql_error());
            // mysql_select_db('lv003', $dbConnect) or die('Query interrupted' . mysql_error());

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
                $this->synOrderListUpdate($row, $db);
            }
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
        $success = '';
        $isNew = 1;
        $isOrder = Order::model()->findByAttributes(array('order_site_id' => $db->site_id, 'invoice_id' => $row['invoice_id']));
        if ($isOrder) {
            $order = $isOrder;
            $custmerId = (int) $row['customer_id'];
            $order->order_status=$row['order_status'];
            $order->order_ship_id=$roew['order_ship_id'];
            $order->order_valid = $row['order_valid'];
            $order->order_export = $row['order_export'];
            $order->order_create_at = $row['order_create_at'];
            if ($order->update()) {
                
            }  else {
                var_dump($order->errors);
            }
        } else {
            $order = new Order();
            $order->order_site_id = $db->site_id;
            $order->invoice_id = $row['invoice_id'];
            $custmerId = (int) $row['customer_id'];
            $userAndAddress = $this->setUser($row, $db);
            $order->customer_id = $userAndAddress['userId'];                                //change
            $order->order_subtotal = $row['order_subtotal'];
            $order->order_trackingtotal = $row['order_trackingtotal'];
            $order->order_promo_free = $row['order_promo_free'];
            $order->order_grandtotal = $row['order_grandtotal'];
            $order->order_currency_id = $row['order_currency_id'];
            $order->order_payment_id = $row['order_payment_id'];
            $order->order_carrier_id = $row['order_carrier_id'];                      //change
            $order->order_address_id = $userAndAddress['addressId'];                      //change
            $order->order_ship_id = $row['order_ship_id'];
            $order->order_discount_id = $row['order_discount_id'];
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
                $sqlItem = "SELECT t1.*,t2.product_name,t2.product_sku,t3.* FROM syo_order_item as t1
                        LEFT JOIN syo_product as t2 ON t1.item_product_id=t2.product_id
                        LEFT JOIN syo_order_attribute as t3 ON t1.item_attribute_id=t3.order_attribute_id
                        where t1.order_id={$row['order_id']}";

                $queryItem = mysql_query($sqlItem);
                while ($rowItem = @mysql_fetch_array($queryItem)) {
                    //同步属性
                    if ($rowItem['order_attribute_color'] || $rowItem['order_attribute_size']) {
                        $orderAttribute = OrderAttribute::model()->findByAttributes(array('order_attribute_size' => $rowItem['order_attribute_size'], 'order_attribute_color' => $rowItem['order_attribute_color']));
                        if (!$orderAttribute) {
                            $orderAttribute = new OrderAttribute();
                            $orderAttribute->order_attribute_color = $rowItem['order_attribute_color'];
                            $orderAttribute->order_attribute_size = $rowItem['order_attribute_size'];
                            if ($orderAttribute->save()) {
                                
                            } else {
                                var_dump($orderAttribute->errors);
                            }
                        }
                    }
                    //同步订单
                    //$product = ProductCollection::model()->findByAttributes(array('product_sku' => $rowItem['product_sku'], 'product_site_id' => $db->site_id));
                    $product = ProductCollection::model()->findByAttributes(array('product_sku' => $rowItem['product_sku']));
                    if (!$product) {
                        $product = new ProductCollection();
                        if (!$rowItem['product_name'] || !$rowItem['product_sku']) {
                            $product->product_name = $rowItem['item_product_name'];       //更新时候可以 item_product_name可以保存SKU
                            $product->product_sku = $rowItem['item_product_name'];
                        } else {
                            $product->product_name = $rowItem['product_name'];
                            $product->product_sku = $rowItem['product_sku'];
                        }
                        $product->product_site_id = $db->site_id;
                        $product->save();
                    }
                    $orderItem = new OrderItem();
                    $orderItem->item_qty = $rowItem['item_qty'];
                    $orderItem->item_price = $rowItem['item_price'];
                    $orderItem->item_weight = $rowItem['item_weight'];
                    $orderItem->item_total = $rowItem['item_total'];
                    $orderItem->item_attribute_id = $orderAttribute->order_attribute_id;
                    $orderItem->item_product_id = $product->product_id;
                    $orderItem->item_product_name = $product->product_sku;
                    $orderItem->order_id = $order->order_id;
                    $orderItem->save();
                }
            } else {
                $error .=$db->site_prefix . $row['invoice_id'] . '订单同步失败！<br>';
            }
        }
    }

    /**
     * 用户账号和地址信息录入
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
            $userString = md5($user->customer_name . $user->customer_active . $user->customer_role . $user->customer_default_address . $user->customer_group);
            $rowUserString = md5($row['customer_name'] . $row['customer_active'] . $row['customer_role'] . $row['customer_default_address'] . $row['customer_group']);
            if ($userString != $rowUserString) {
                $user->customer_active = $row['customer_active'];
                $user->customer_role = $row['customer_role'];
                $user->customer_default_address = $row['customer_default_address'];
                $user->customer_group = $row['customer_group'];
                $user->customer_visit_count = $row['customer_visit_count'];
                $user->save();
            }
            $userId = $user->customer_id;
            //检查地址是否存在
            $address = $user->address;
            $isAddressExist = 0;
            foreach ($address as $key => $value) {
                $addressString = $value->address_create_at;
                $rowString = $row['address_create_at'];

                if (md5($addressString) == md5($rowString)) {
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
                $userId = $user->customer_id;
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
    
    
    private function _load_model() {
        if (isset($_GET['id'])) {
            $model = Order::model()->findByPk($_GET['id']);
        }
        if ($model == null) {
            throw new CHttpException(404, "The requested page does not exist!");
        }
        return $model;
    }
    

}
