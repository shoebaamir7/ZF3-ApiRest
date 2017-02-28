<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Json\Json;
use Doctrine\ORM\EntityManager;
use Application\Entity\Book;
use Application\Entity\Repository\BookRepository;
use Application\Form\BookForm;
use Application\InputFilter\FormBookFilter;

class BookController extends AbstractRestfulController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

    public function getList()
    {
        $books = $this->entityManager->getRepository(Book::class)->findAll();
		$data = [];

        foreach($books as $book) {
        	$data[] = $book->toArray();
    	}

        return new JsonModel([
            'books' => $data,
        ]);
    }

    public function get($id)
    {
        $book = $this->entityManager->getRepository(Book::class)->find($id);

		return new JsonModel([
            'book' => $book->toArray(),
        ]);
    }

    public function create($data)
    {
        $book = new Book();
        $form = new BookForm();
        $request = $this->getRequest();
        $inputfilter = new FormBookFilter();
        $form->setInputFilter($inputfilter);
        $form->setData($request->getPost());

        if ($form->isValid()) {
			$book->setTitle($data['title']);
			$book->setPrice($data['price']);
			$this->entityManager->persist($book);
			$this->entityManager->flush();
		}

        return new JsonModel([
            'book' => $book->toArray(),
            'message' => 'Book create successful'
        ]);
    }

    public function update($id, $data)
    {
        $form  = new BookForm();
		$request = $this->getRequest();
        $inputfilter = new FormBookFilter();
        $form->setInputFilter($inputfilter);
        $book = $this->entityManager->getRepository(Book::class)->findOneBy(['id' => $id]);
        $form->bind($book);
        $form->setData($data);

        if ($form->isValid()) {
			$this->entityManager->persist($book);
			$this->entityManager->flush();
		}

		return new JsonModel([
			'book' => $book->toArray(),
            'message' => 'Book update successful!'
		]);
    }

    public function delete($id)
    {
        $book = $this->entityManager->getRepository(Book::class)->findOneBy(['id' => $id]);

		if ($book) {
			$this->entityManager->remove($book);
			$this->entityManager->flush();
		}

        return new JsonModel([
            'message' => 'Book deleted successful!'
        ]);
    }
}
