<?php
class quangcao_top
{
    public $Id,$Name,$Img,$Link_web;
    public function quangcao_top($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->Link_web=isset($data['Link_web'])?$data['Link_web']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->Link_web=addslashes($this->Link_web);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->Link_web=stripslashes($this->Link_web);
        }
}
