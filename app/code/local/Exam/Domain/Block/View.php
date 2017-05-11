<?php
/**
 * Class
 *
 * @author                 Benjamin Hil <benjamin.hil@dnd.fr>
 * @copyright              Copyright (c) 2017 Agence Dn'D
 * @license                http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link                   http://www.dnd.fr/
 */
class Exam_Domain_Block_View extends Mage_Core_Block_Template
{
    public function getCurrentDomain()
    {
        return Mage::registry('domain_data');
    }

}
