<?php
class tintuc
{
    public $Id,$Name,$Img,$View,$NoiDung,$Title,$Keyword,$Description,$Created;
    public function tintuc($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->View=isset($data['View'])?$data['View']:'';
    $this->NoiDung=isset($data['NoiDung'])?$data['NoiDung']:'';
    $this->Title=isset($data['Title'])?$data['Title']:'';
    $this->Keyword=isset($data['Keyword'])?$data['Keyword']:'';
    $this->Description=isset($data['Description'])?$data['Description']:'';
    $this->Created=isset($data['Created'])?$data['Created']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->View=addslashes($this->View);
            $this->NoiDung=addslashes($this->NoiDung);
            $this->Title=addslashes($this->Title);
            $this->Keyword=addslashes($this->Keyword);
            $this->Description=addslashes($this->Description);
            $this->Created=addslashes($this->Created);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->View=stripslashes($this->View);
            $this->NoiDung=stripslashes($this->NoiDung);
            $this->Title=stripslashes($this->Title);
            $this->Keyword=stripslashes($this->Keyword);
            $this->Description=stripslashes($this->Description);
            $this->Created=stripslashes($this->Created);
        }
}
