<?php

namespace Application\InputFilter;

use Zend\InputFilter\InputFilter;

class FormBookFilter extends InputFilter
{
	public function __construct()
	{
	    $this->add([
            'name'       => 'id',
            'required'   => false,
            'allowEmpty' => false,
            'filters'    => [
            ],
            'validators' => [
            ],
        ]);

        $this->add([
			'name' => 'title',
			'required' => true,
			'allowEmpty' => true,
			'filters' => [
				['name' => 'StringTrim'],
			],
			'validators' => [
				[
					'name' => 'StringLength',
					'options' => [
						'min' => 4,
						'max' => 50,
					],
				],
			],
		]);

		$this->add([
			'name' => 'price',
			'required' => true,
			'allowEmpty' => true,
			'filters' => [
				['name' => 'StringTrim'],
			],
			'validators' => [
				[
					'name' => 'StringLength',
					'options' => [
						'min' => 4,
						'max' => 50,
					],
				],
			],
		]);
	}
}
