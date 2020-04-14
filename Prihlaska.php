<?php


/**
 * Description of Prihlaska
 *
 * @author Michal
 */
class Prihlaska extends Nette\Application\UI\Form{
   
     public function __construct($parent, $name) {
        parent::__construct();

        $this->setAction($parent->link("Prihlaska:success"));

        $this->setMethod("POST");

        $this->addText('jmenoR', 'Jmeno Rodiče')
                ->setRequired('není jmeno');

        $this->addEmail('emailR', 'Email Rodiče')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::EMAIL, 'Email je neplatny');

        $this->addText('jmenoD', 'Jmeno dítěte')
                ->setRequired(TRUE);

        $this->addUpload('File', 'Fotka dítěte');

        $this->addPassword('heslo', 'Heslo')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::MIN_LENGTH, 'Heslo musi mit 6 znaku', 6);

        $this->addPassword('heslo2', 'Heslo znovu')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::EQUAL, 'Hesla se neshoduji', $this['heslo']);

        $this->addRadioList('Vek', 'Vek', array('5 let', "7 let", '10 let', '15 let'))
                ->setRequired(TRUE);

        $this->addSelect('ChceteObed', 'Chcete oběd', array('Ano', 'Ne'))
                ->setRequired(TRUE);

        $this->addRadioList('Jazyk', 'Druhy jazyk', array('Angličtina', 'Němčina', 'Ruština'))
                ->setRequired(TRUE);

        $this->addText('pocet', 'pocet hodin hlídání')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::INTEGER, 'Neni cislo!');

        $this->addSelect('Jidlo', 'oblibený jidlo', array('Svíčková', 'řízek', 'špagety'))
                ->setRequired(TRUE);

        $this->addTextArea('Pripominka', 'Důležítá připomínka');


        $this->addSubmit('Odeslat', 'Odeslat');
    }

}