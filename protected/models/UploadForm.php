<?php
class UploadForm extends CFormModel
{
    public $archive;

     public function rules(){
        return array(
            array('archive', 'file', 'types'=>'zip'),
        );
    }
}