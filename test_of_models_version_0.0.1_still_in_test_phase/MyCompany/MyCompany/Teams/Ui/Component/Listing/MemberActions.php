<?php
namespace MyCompany\Teams\Ui\Component\Listing;

use Magento\Ui\Component\Listing\Columns\Column;

class MemberActions extends Column
{
    const URL_PATH_EDIT = 'mycompany_teams/member/edit';
    const URL_PATH_DELETE = 'mycompany_teams/member/delete';

    protected $urlBuilder;
    private $editUrl;

    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        $editUrl = self::URL_PATH_EDIT,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['member_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            $this->editUrl,
                            ['member_id' => $item['member_id']]
                        ),
                        'label' => __('Edit'),
                    ];

                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_DELETE,
                            ['member_id' => $item['member_id']]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.name }"'),
                            'message' => __('Are you sure you want to delete this record?'),
                        ],
                    ];
                }
            }
        }

        return $dataSource;
    }
}
