<?php
namespace Custom\Member\Api;

interface AllmemberRepositoryInterface
{
	public function save(\Custom\Member\Api\Data\AllmemberInterface $member);

    public function getById($memberId);

    public function delete(\Custom\Member\Api\Data\AllmemberInterface $member);

    public function deleteById($memberId);
}
?>