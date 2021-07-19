<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class ChannelAdmin extends AbstractAdmin
{

    // fonction qui n'affichait pas les entité

   /* function configureQuery(ProxyQueryInterface $query): ProxyQueryInterface
    {
        $query->andWhere('1 = 0');

        return $query;
    }*/

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('num')
            ->add('name')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('num')
            ->add('name')
            ->add('creation_date')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('num')
            ->add('name')
            ->add('creation_date',DateType::class,[
                'format' => 'ddMMyyyy',
            ])
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('num')
            ->add('name')
            ->add('creation_date',DateType::class,[
                'format' => 'ddMMyyyy',
            ])
            ;
    }
}
