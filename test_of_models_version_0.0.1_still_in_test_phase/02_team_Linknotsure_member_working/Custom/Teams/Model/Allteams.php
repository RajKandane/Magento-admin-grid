<?php
namespace Custom\Teams\Model;

use Custom\Teams\Api\Data\AllteamsInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class Allteams extends AbstractModel implements AllteamsInterface, IdentityInterface
{
	const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
	
	const CACHE_TAG = 'custom_teams';
	
	//Unique identifier for use within caching
	protected $_cacheTag = self::CACHE_TAG;
	
	protected function _construct()
    {
        $this->_init('Custom\Teams\Model\ResourceModel\Allteams');
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
	
    public function getteamsId()
	{
		return parent::getData(self::TEAMS_ID);
	}

	public function getdepartmentName()
	{
		return $this->getData(self::DEPARTMENT_NAME);
	}
	
	public function getStatus()
    {
        return $this->getData(self::STATUS);
    }
	
	public function getCreatedBy()
	{
		return $this->getData(self::CREATED_BY);
	}

	public function getCreatedAt()
	{
		return $this->getData(self::CREATED_AT);
	}

    public function getUpdatedBy()
	{
		return $this->getData(self::UPDATED_BY);
	}

	public function getUpdatedAt()
	{
		return $this->getData(self::UPDATED_AT);
	}
	
	public function setteamsId($teams_id)
	{
		return $this->setData(self::TEAMS_ID, $teams_id);
	}

	public function setdepartmentName($department_name)
	{
		return $this->setData(self::DEPARTMENT_NAME, $department_name);
	}
	
	public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
	
	public function setCreatedBy($created_by)
	{
		return $this->setData(self::CREATED_BY, $created_by);
	}

	public function setCreatedAt($created_at)
	{
		return $this->setData(self::CREATED_AT, $created_at);
	}

    public function setUpdatedBy($updated_by)
	{
		return $this->setData(self::UPDATED_BY, $updated_by);
	}

	public function setUpdatedAt($updated_at)
	{
		return $this->setData(self::UPDATED_AT, $updated_at);
	}
}
?>