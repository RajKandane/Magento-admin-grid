<?php
namespace Manage\Member\Api;

interface AllmemberRepositoryInterface
{
	public function save(\Manage\Member\Api\Data\AllmemberInterface $member);

    public function getById($memberId);

    public function delete(\Manage\Member\Api\Data\AllmemberInterface $member);

    public function deleteById($memberId);
}
