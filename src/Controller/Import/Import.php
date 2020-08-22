<?php

namespace App\Controller\Import;

use App\Form\ImportFileType;
use mql21\CsvImporter\CsvImporterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Import extends AbstractController
{
    private $csvImporter;

    public function __construct(CsvImporterInterface $csvImporter)
    {
        $this->csvImporter = $csvImporter;
    }

    public function __invoke(Request $request)
    {
        $importPersonsForm = $this->createForm(ImportFileType::class);
        $importPersonsForm->handleRequest($request);

        if ($importPersonsForm->isSubmitted() && $importPersonsForm->isValid()) {
            $file = $importPersonsForm['attachment']->getData();

            $completeMessage = $this->csvImporter->import($file->getRealPath(), 'test.person');

            $messageType = key($completeMessage);
            $this->addFlash($messageType, $completeMessage[$messageType]);
        }

        return $this->render('import/index.html.twig', [
            'import_form' => $importPersonsForm->createView()
        ]);
    }
}
