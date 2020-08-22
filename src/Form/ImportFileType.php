<?php

  namespace App\Form;

  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Contracts\Translation\TranslatorInterface;

class ImportFileType extends AbstractType
{

    private $translator;
    
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('attachment', FileType::class, [
          'label' => 'Import file: ',
        ])
        ->add('save', SubmitType::class);
    }
}
