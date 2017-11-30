<?php
class dathang
{
    public $Id,$Id_chung,$Name,$Email,$Phone,$Address,$TrangThai,$NoiDung,$Created;
    public function dathang($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Id_chung=isset($data['Id_chung'])?$data['Id_chung']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Email=isset($data['Email'])?$data['Email']:'';
    $this->Phone=isset($data['Phone'])?$data['Phone']:'';
    $this->Address=isset($data['Address'])?$data['Address']:'';
    $this->TrangThai=isset($data['TrangThai'])?$data['TrangThai']:'';
    $this->NoiDung=isset($data['NoiDung'])?$data['NoiDung']:'';
    $this->Created=isset($data['Created'])?$data['Created']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Id_chung=addslashes($this->Id_chung);
            $this->Name=addslashes($this->Name);
            $this->Email=addslashes($this->Email);
            $this->Phone=addslashes($this->Phone);
            $this->Address=addslashes($this->Address);
            $this->TrangThai=addslashes($this->TrangThai);
            $this->NoiDung=addslashes($this->NoiDung);
            $this->Created=addslashes($this->Created);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Id_chung=stripslashes($this->Id_chung);
            $this->Name=stripslashes($this->Name);
            $this->Email=stripslashes($this->Email);
            $this->Phone=stripslashes($this->Phone);
            $this->Address=stripslashes($this->Address);
            $this->TrangThai=stripslashes($this->TrangThai);
            $this->NoiDung=stripslashes($this->NoiDung);
            $this->Created=stripslashes($this->Created);
        }
}
