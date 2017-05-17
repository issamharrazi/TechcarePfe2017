<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 14/05/2017
 * Time: 16:07
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\Group as BaseGroup;

/**
 * @MongoDB\Document
 */
class GroupeUser extends BaseGroup
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

}
