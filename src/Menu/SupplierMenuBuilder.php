<?php
declare(strict_types=1);

namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SupplierMenuBuilder {

    public function buildMenu(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $catalogMenu = $menu->getChild('catalog');


        $catalogMenu
            ->addChild('supplier', [
                'route' => 'app_admin_supplier_index',
            ])
            ->setLabel('app.ui.suppliers')
            ->setLabelAttribute('icon', 'sticky note')
        ;
    }


}
