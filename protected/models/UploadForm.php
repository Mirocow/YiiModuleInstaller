<?php
class UploadForm extends CFormModel
{
    public $archive;

     public function rules(){
        return array(
            //устанавливаем правила для файла, позволяющие загружать
            // только картинки!
            array('archive', 'file', 'types'=>'zip'),
        );
    }
}