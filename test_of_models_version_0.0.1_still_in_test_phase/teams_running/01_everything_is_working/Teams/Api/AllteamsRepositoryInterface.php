<?php
namespace Custom\Teams\Api;

interface AllteamsRepositoryInterface
{
	public function save(\Custom\Teams\Api\Data\AllteamsInterface $teams);

    public function getById($teamsId);

    public function delete(\Custom\Teams\Api\Data\AllteamsInterface $teams);

    public function deleteById($teamsId);
}
?>