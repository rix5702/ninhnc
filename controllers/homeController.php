<?php
class homeController extends baseController{

    private $nganhModel;
    private $doanModel;
    public function __construct()
    {
        $this->loadModel('nganhModel');
        $this->nganhModel = new nganhModel;
        $this->loadModel('doanModel');
        $this->doanModel = new doanModel;

    }
    public function index(){
        $this->loadview('home.index',);
        $nganh = $this->nganhModel->getAll();
        $loaidoan = $this->doanModel->getloai();
        $this->loadview('home.index',[  
          'nganh' => $nganh ,
          'loaidoan' => $loaidoan
        ]);
    }
    

}
?>
