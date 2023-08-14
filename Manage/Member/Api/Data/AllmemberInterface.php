<?php
namespace Manage\Member\Api\Data;

interface AllmemberInterface
{
	const MEMBER_ID      = 'member_id';
	const NAME           = 'name';
	const DEPARTMENT     = 'department';
    const STATUS 		 = 'status';
	const PHOTO          = 'photo';
	const TITLE          = 'title';
	const QUOTES         = 'quotes';
    
	public function getmemberId();

	public function getName();

	public function getDepartment();

    public function getStatus();
	
	public function getPhoto();

	public function getTitle();

    public function getQuotes();
	
	public function setmemberId($member_id);

	public function setName($name);

	public function setDepartment($department);
	
    public function setStatus($status);

    public function setPhoto($photo);

	public function setTitle($title);

	public function setQuotes($quotes);

}
?>