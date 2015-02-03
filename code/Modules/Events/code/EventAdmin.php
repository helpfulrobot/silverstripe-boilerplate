<?php

/**
 * Class EventAdmin
 */
class EventAdmin extends ModelAdmin {

    private static $menu_icon = 'boilerplate/code/Modules/Events/images/calendar_menu.png';

    private static $managed_models = array(
        'Event'
    );
    private static $url_priority = 100;

    private static $url_segment = 'events';

    private static $menu_title = 'Events';

    private static $url_handlers = array(
        '$ModelClass/$Action' => 'handleAction',
        '$ModelClass/$Action/$ID' => 'handleAction',
    );

    /**
     * @param null $id
     * @param null $fields
     * @return mixed
     */
    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        $gridFieldName = $this->sanitiseClassName($this->modelClass);
        $gridField = $form->Fields()->fieldByName($gridFieldName);
        //$gridField->getConfig()->removeComponentsByType($gridField->getConfig()->getComponentByType('GridFieldAddNewButton'));
        $gridField->getConfig()->removeComponentsByType($gridField->getConfig()->getComponentByType('GridFieldPrintButton'));
        //$gridField->getConfig()->removeComponentsByType($gridField->getConfig()->getComponentByType('GridFieldExportButton'));

        return $form;
    }

}