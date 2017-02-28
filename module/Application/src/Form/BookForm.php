<?php

namespace Application\Form;

use Zend\Form\Form;

class BookForm extends Form
{
    public function __construct($name = 'book', $options = array())
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'id',
            'attributes' => [
                'type'  => 'hidden',
            ],
        ]);

        $this->add([
            'name' => 'title',
            'attributes' => [
                'type'  => 'text',
            ],
            'options' => [
                'label' => 'Title',
            ],
        ]);

		$this->add([
            'name' => 'price',
            'attributes' => [
                'type'  => 'text',
            ],
            'options' => [
                'label' => 'Price',
            ],
        ]);
	}
}
