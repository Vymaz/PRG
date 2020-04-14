<?php




namespace App\Presenters;




class PrihlaskaPresenter extends \Nette\Application\UI\Presenter{
    
    public function createComponentPrihlaska($name) {
           return new \Prihlaska($this, $name);
    }
    
    public function actionSuccess($name) {
           $odeslat = $this ->getRequest();
  
            $this->template->odeslat = $odeslat->post;

       }
    
}
