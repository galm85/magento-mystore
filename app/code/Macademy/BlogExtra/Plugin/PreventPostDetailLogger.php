<?php

namespace Macademy\BlogExtra\Plugin;

use Macademy\Blog\Observer\LogPostDetailView;

class PreventPostDetailLogger
{


    public function aroundExecute(LogPostDetailView $subject, callable $proceed){

        // don't do anything
    }

}
