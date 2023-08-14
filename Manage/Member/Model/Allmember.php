<?php
namespace Manage\Member\Model;

use Manage\Member\Api\Data\AllmemberInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class Allmember extends AbstractModel implements AllmemberInterface, IdentityInterface
{
	const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
	
	const CACHE_TAG = 'manage_member';
	
	//Unique identifier for use within caching
	protected $_cacheTag = self::CACHE_TAG;
	
	protected function _construct()
    {
        $this->_init('Manage\Member\Model\ResourceModel\Allmember');
    }
	
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
	
	public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
	
	public function getmemberId()
    {
        return parent::getData(self::MEMBER_ID);
    }
	
	public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getDepartment()
    {
        return $this->getData(self::DEPARTMENT);
    }

	public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

	public function getPhoto()
    {
        return $this->getData(self::PHOTO);
    }

	public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
	
	public function getQuotes()
    {
        return $this->getData(self::QUOTES);
    }

	
	public function setmemberId($member_id)
    {
        return $this->setData(self::MEMBER_ID, $member_id);
    }

	public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
	
	public function setDepartment($department)
    {
        return $this->setData(self::DEPARTMENT, $department);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
	
    public function setPhoto($photo)
    {
        return $this->setData(self::PHOTO, $photo);
    }

	public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
	
	public function setQuotes($quotes)
    {
        return $this->setData(self::QUOTES, $quotes);
    }
	

}