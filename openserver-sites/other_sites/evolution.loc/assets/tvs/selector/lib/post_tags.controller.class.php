<?php
namespace Selector;

include_once(MODX_BASE_PATH.'assets/tvs/selector/lib/controller.class.php');

class Post_tagsController extends SelectorController {
    public function __construct($modx) {
        parent::__construct($modx);
        $this->dlParams['addWhereList'] = 'c.published = 1 AND c.template = 7';
    }
}


