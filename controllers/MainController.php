<?php 

class MainController
{
    public function actionError404()
    {
        require_once(ROOT.'/views/error404.php');
        return true;
    }
}

?>