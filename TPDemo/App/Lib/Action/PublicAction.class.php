<?php
/**
 * Created by PhpStorm.
 * User: Mingjun
 * Date: 2015/10/13
 * Time: 19:30
 */

class PublicAction extends Action {
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

}