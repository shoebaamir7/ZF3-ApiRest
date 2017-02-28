<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\BookRepository")
 * @ORM\Table(name="books")
 */
class Book
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", nullable=true)
     */
    private $price;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
	 * Return this object in array form.
     *
	 * @return array
     */
    public function toArray()
	{
		$data = get_object_vars($this);

	    foreach ($data as $attribute => $value) {
			if (is_object($value)) {
				$data[$attribute] = get_object_vars($value);
			}
		}

		return $data;
	}

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}

	/**
     * Fill this object from an array
     */
    public function exchangeArray($data)
    {
		if ($data != null) {
			 foreach ($data as $attribute => $value) {
				 if (! property_exists($this, $attribute)) {
					 continue;
				 }
				 $this->$attribute = $value;
			 }
		}

		return $this;
    }
}
