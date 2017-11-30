<?php
class danhmuc
{
    public $Id,$Name,$position,$Title,$Keyword,$Description;
    public function danhmuc($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->position=isset($data['position'])?$data['position']:'';
    $this->Title=isset($data['Title'])?$data['Title']:'';
    $this->Keyword=isset($data['Keyword'])?$data['Keyword']:'';
    $this->Description=isset($data['Description'])?$data['Description']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name=addslashes($this->Name);
            $this->position=addslashes($this->position);
            $this->Title=addslashes($this->Title);
            $this->Keyword=addslashes($this->Keyword);
            $this->Description=addslashes($this->Description);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name=stripslashes($this->Name);
            $this->position=stripslashes($this->position);
            $this->Title=stripslashes($this->Title);
            $this->Keyword=stripslashes($this->Keyword);
            $this->Description=stripslashes($this->Description);
        }
}
