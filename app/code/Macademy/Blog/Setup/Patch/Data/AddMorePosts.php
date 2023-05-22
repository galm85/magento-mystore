<?php

namespace Macademy\Blog\Setup\Patch\Data;

use Macademy\Blog\Api\PostRepositoryInterface;
use Macademy\Blog\Model\PostFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddMorePosts implements DataPatchInterface
{

    protected $newPosts = [
        'post1' => [
            'title'=> 'Second Post',
            'content'=>'This is the second post content'
        ],
        'post2' => [
            'title'=> 'Third Post',
            'content'=>'This is the Third post content'
        ],
        'post3' => [
            'title'=> 'Fourth Post',
            'content'=>'This is the Fourth post content'
        ]
    ];

    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository
    )
    {}

    public static function getDependencies()
    {
       return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        foreach ($this->newPosts as $post){

            $currentPost = $this->postFactory->create();
            $currentPost->setData([
                'title'=>$post['title'],
                'content' =>$post['content']
            ]);

            $this->postRepository->save($currentPost);


        }


        $this->moduleDataSetup->endSetup();
    }
}
