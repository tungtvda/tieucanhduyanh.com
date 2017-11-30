<?php
class lienhe
{
    public $Id,$Name_kh,$Name_sp,$Price,$Address,$Phone,$Email,$TieuDe,$NoiDung;
    public function lienhe($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name_kh=isset($data['Name_kh'])?$data['Name_kh']:'';
    $this->Name_sp=isset($data['Name_sp'])?$data['Name_sp']:'';
    $this->Price=isset($data['Price'])?$data['Price']:'';
    $this->Address=isset($data['Address'])?$data['Address']:'';
    $this->Phone=isset($data['Phone'])?$data['Phone']:'';
    $this->Email=isset($data['Email'])?$data['Email']:'';
    $this->TieuDe=isset($data['TieuDe'])?$data['TieuDe']:'';
    $this->NoiDung=isset($data['NoiDung'])?$data['NoiDung']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name_kh=addslashes($this->Name_kh);
            $this->Name_sp=addslashes($this->Name_sp);
            $this->Price=addslashes($this->Price);
            $this->Address=addslashes($this->Address);
            $this->Phone=addslashes($this->Phone);
            $this->Email=addslashes($this->Email);
            $this->TieuDe=addslashes($this->TieuDe);
            $this->NoiDung=addslashes($this->NoiDung);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name_kh=stripslashes($this->Name_kh);
            $this->Name_sp=stripslashes($this->Name_sp);
            $this->Price=stripslashes($this->Price);
            $this->Address=stripslashes($this->Address);
            $this->Phone=stripslashes($this->Phone);
            $this->Email=stripslashes($this->Email);
            $this->TieuDe=stripslashes($this->TieuDe);
            $this->NoiDung=stripslashes($this->NoiDung);
        }
}
