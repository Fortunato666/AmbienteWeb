<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Medicamentos;
use app\models\Pacientes;
use app\models\Facturas;
use app\models\FacturaDetalle;
use app\models\Departamento;
use app\models\Municipio;
use app\models\Clientes;
use app\models\Producto;
use app\models\Factura;
use app\models\DetFactura;


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

    public function actionMision()
    {

        return $this->render('mision');
    }

    public function actionIf()
    {

        return $this->render('if');
    }

    public function actionFor()
    {

        return $this->render('for');
    }

    public function actionVector()
    {
        return $this->render('vector');
    }

    public function actionMatriz()
    {

        return $this->render('matriz');
    }

    public function actionRegistro()
    {
        return  $this->render('registro');
    }


    public function actionVerificarusuario()
    {

        if ($_POST['txt_password'] == '123' and $_POST['txt_usuario'] == 'denys') {

            $mensaje = 1;
        } else {
            $mensaje = 0;
        }

        echo $mensaje;
    }

    public function actionBienvenido()
    {

        return $this->render('bienvenido');
    }


    public function actionSaludo()
    {
        echo 'SALUDOS ALUMNOS DESDE AJAX';
    }


    public function actionSuma()
    {
        return $this->render('suma');
    }

    public function actionCalcular()
    {

        $a = $_POST["txt_a"];
        $b = $_POST["txt_b"];

        $resultado = $a + $b;

        echo $resultado;
    }

    public function actionVermedicamentos()
    {
        $datos      = Medicamentos::getMedicamentos();
        $pacientes  = Pacientes::getPacientes();
        return $this->render(
            'verMedicamentos',
            array(
                'datos'     => $datos,
                'pacientes' => $pacientes
            )
        );
    }


    public function actionFrmmedicamentos()
    {
        return $this->render('frm_medicamentos');
    }


    public function actionInsertarmedicamento()
    {
        Medicamentos::insertar(
            $_POST['nombre'],
            $_POST['precio'],
            $_POST['estatus']
        );
    }



    public function actionTblmedicamentos()
    {
        $data   = Medicamentos::getMedicamentos();

        return $this->renderPartial(
            '_tblMedicamnetos',
            array('data' => $data)
        );
    }



    public function actionDeletemedicamentos()
    {
        Medicamentos::deletem($_POST['idmedicamneto']);
    }

    public function actionTipofactura()
    {
        return Factura::comboFactura($_POST['id_factura']);
    }

    public function actionIndexdepartamento()
    {
        $dataDe = Departamento::consultaDepartamentos();
        return $this->render('indexDepartamento', array('dataD' => $dataDe));
    }

    public function actionGuardardepartamento()
    {
        Departamento::Guardar($_POST['descripcion']);
    }

    public function actionUpdatedepartamento($id)
    {
        $data = Departamento::consultabyPK($id);
        return $this->render('frmDepartamentoUpdate', array('dataD' => $data));
    }

    public function actionActualizardepartamento()
    {
        Departamento::actualizar($_POST['id_departamento'], $_POST['descripcion']);
    }

    public function actionDeletedepartamento($id)
    {
        $data = Departamento::consultabyPK($id);
        return $this->render('frmDeleteDepartamento', array('dataD' => $data));
    }

    public function actionEliminardepartamento()
    {
        Departamento::eliminar($_POST['id_departamento']);
    }

    public function actionIndexmunicipio()
    {
        $dataD = Departamento::consultaDepartamentos();
        $dataM = Municipio::consultaMunicipios();
        return $this->render('indexMunicipios', array('dataM' => $dataM, 'dataD' => $dataD));
    }

    public function actionGuardarmunicipio()
    {
        Municipio::Guardar($_POST['descripcion'], $_POST['id_departamento']);
    }

    public function actionUpdatemunicipios($id)
    {
        $data = Municipio::consultabyPK($id);
        $dataD = Departamento::consultaDepartamentos();
        return $this->render('frmMunicipioUpdate', array('dataM' => $data, 'dataD' => $dataD));
    }

    public function actionActualizarmunicipio()
    {
        Municipio::actualizar($_POST['id_municipio'], $_POST['descripcion'], $_POST['id_departamento']);
    }

    public function actionDeletemunicipios($id)
    {
        $data = Municipio::consultabyPK($id);
        $dataD = Departamento::consultaDepartamentos();
        return $this->render('frmDeleteMunicipio', array('dataM' => $data, 'dataD' => $dataD));
    }

    public function actionEliminarmunicipio()
    {
        Municipio::eliminar($_POST['id_municipio']);
    }

    public function actionIndexclientes()
    {
        $dataC = Clientes::consultaClientes();
        $dataM = Municipio::consultaMunicipios();
        return $this->render('indexClientes', array('dataM' => $dataM, 'dataC' => $dataC));
    }

    public function actionGuardarcliente()
    {
        Clientes::Guardar($_POST['nombre_cliente'], $_POST['apellido_cliente'], $_POST['direccion'], $_POST['id_municipio']);
    }

    public function actionUpdateclientes($id)
    {
        $dataC = Clientes::consultabyPK($id);
        $dataM = Municipio::consultaMunicipios();
        return $this->render('frmClienteUpdate', array('dataM' => $dataM, 'dataC' => $dataC));
    }

    public function actionActualizarcliente()
    {
        Clientes::actualizar($_POST['id_cliente'], $_POST['nombre_cliente'], $_POST['apellido_cliente'], $_POST['direccion'], $_POST['id_municipio']);
    }

    public function actionDeleteclientes($id)
    {
        $data = Clientes::consultabyPK($id);
        $dataM = Municipio::consultaMunicipios();
        return $this->render('frmDeleteCliente', array('dataC' => $data, 'dataM' => $dataM));
    }

    public function actionEliminarcliente()
    {
        Clientes::eliminar($_POST['id_cliente']);
    }

    public function actionIndexproducto()
    {
        $dataP = Producto::consultaProductos();
        return $this->render('indexProducto', array('dataP' => $dataP));
    }

    public function actionGuardarproductos()
    {
        Producto::Guardar($_POST['nombre_producto'], $_POST['precio'], $_POST['debaja']);
    }

    public function actionUpdateproductos($id)
    {
        $dataP = Producto::consultabyPK($id);
        return $this->render('frmProductoUpdate', array('dataP' => $dataP));
    }

    public function actionActualizarproductos()
    {
        Producto::actualizar($_POST['id_producto'], $_POST['nombre_producto'], $_POST['precio']);
    }

    public function actionDeleteproductos($id)
    {
        $data = Producto::consultabyPK($id);
        return $this->render('frmDeleteProducto', array('dataP' => $data));
    }

    public function actionEliminarproductos()
    {
        Producto::eliminar($_POST['id_producto']);
    }

    public function actionIndexfactura()
    {
        $dataC = Clientes::comboClientes();
        $dataF = Factura::consultaFactura();
        return $this->render('indexFactura', array('dataF' => $dataF, 'dataC' => $dataC));
    }

    public function actionGuardarfactura()
    {
        Factura::Guardar($_POST['id_cliente'], $_POST['fecha'], $_POST['num_factura'], $_POST['iva'], $_POST['tipo_factura']);
    }

    public function actionUpdatefactura($id)
    {
        $dataF = Factura::consultabyPK($id);
        return $this->render('frmFacturaUpdate', array('dataF' => $dataF));
    }

    public function actionActualizarfactura()
    {
        Factura::actualizar($_POST['id_factura'], $_POST['fecha'], $_POST['num_factura'], $_POST['tipo_factura']);
    }

    public function actionDeletefactura($id)
    {
        $data = Factura::consultabyPK($id);
        return $this->render('frmDeleteFactura', array('dataF' => $data));
    }

    public function actionEliminarfactura()
    {
        Factura::eliminar($_POST['id_factura']);
    }

    public function actionVentas()
    {
        $factura = Factura::consultaFactura();
        $productos = Producto::consultaProductos();
        return $this->render('ventas', array('productos' => $productos, 'dataF' => $factura));
    }

    public function actionTblproductos()
    {
        $idproducto = $_POST['idproducto'];
        $cantidad = $_POST['cantidad'];
        $descuento = $_POST['descuento'];
        $idfactura = $_POST['id_factura'];

        $data = Producto::ConsultabyPK($idproducto);

        $factura = Yii::$app->session['mifactura'];

        foreach ($data as $d) {
            $factura[] = array(
                'idproducto' => $d['id_producto'],
                'nombre_producto' => $d['nombre_producto'],
                'precio' => $d['precio'],
                'cantidad' => $cantidad,
                'descuento' => $descuento,
                'id_factura' => $idfactura,
                'total' => ($d['precio'] * $cantidad) - $descuento
            );
        }
        Yii::$app->session['mifactura'] = $factura;

        return $this->renderPartial('_tblProductos', array('idproducto' => $idproducto));
    }


    public function actionGuardarfacturas()
    {
        $idfactura = 0;
        $iva = 0;
        $suma = 0;
        $factu =  Yii::$app->session['mifactura'];
        foreach ($factu as $f) {
            DetFactura::Guardar($f['id_factura'], $f['idproducto'], $f['cantidad'], $f['precio'], $f['descuento'], $f['total']);
            $suma = $suma + ($f['total']);
            $idfactura = $f['id_factura'];
        }
        $iva = $suma * 0.13;
        Factura::actualizar_iva($iva, $idfactura);
        unset(yii::$app->session['mifactura']);
    }

    public function actionLimpiarfactura()
    {
        unset(yii::$app->session['mifactura']);
    }
}
