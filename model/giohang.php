<?php
class giohang
{
    public $Id,$Id_chung,$Name,$Img,$Soluong,$DonGia,$ThanhTien;
    public function giohang($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Id_chung=isset($data['Id_chung'])?$data['Id_chung']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->Soluong=isset($data['Soluong'])?$data['Soluong']:'';
    $this->DonGia=isset($data['DonGia'])?$data['DonGia']:'';
    $this->ThanhTien=isset($data['ThanhTien'])?$data['ThanhTien']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Id_chung=addslashes($this->Id_chung);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->Soluong=addslashes($this->Soluong);
            $this->DonGia=addslashes($this->DonGia);
            $this->ThanhTien=addslashes($this->ThanhTien);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Id_chung=stripslashes($this->Id_chung);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->Soluong=stripslashes($this->Soluong);
            $this->DonGia=stripslashes($this->DonGia);
            $this->ThanhTien=stripslashes($this->ThanhTien);
        }
}
