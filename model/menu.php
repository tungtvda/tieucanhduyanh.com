<?php
class menu
{
    public $Id,$Title,$Keyword,$Description;
    public function menu($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Title=isset($data['Title'])?$data['Title']:'';
    $this->Keyword=isset($data['Keyword'])?$data['Keyword']:'';
    $this->Description=isset($data['Description'])?$data['Description']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Title=addslashes($this->Title);
            $this->Keyword=addslashes($this->Keyword);
            $this->Description=addslashes($this->Description);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Title=stripslashes($this->Title);
            $this->Keyword=stripslashes($this->Keyword);
            $this->Description=stripslashes($this->Description);
        }
}
