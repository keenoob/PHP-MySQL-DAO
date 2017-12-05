<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;


   
    public function getIdusuario()
    {
        return $this->idusuario;
    }

   
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getDeslogin()
    {
        return $this->deslogin;
    }

  
    public function setDeslogin($deslogin)
    {
        $this->deslogin = $deslogin;

        return $this;
    }

    public function getDessenha()
    {
        return $this->dessenha;
    }

  
    public function setDessenha($dessenha)
    {
        $this->dessenha = $dessenha;

        return $this;
    }

    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    
    public function setDtcadastro($dtcadastro)
    {
        $this->dtcadastro = $dtcadastro;

        return $this;
    }

    public function loadbyId($id){

    	$sql = new Sql();

    	$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
    		":ID"=>$id));
    	if(isset($result[0])){
    		$row = $result[0];
    		$this->setIdusuario($row['idusuario']);
    		$this->setDeslogin($row['deslogin']);
    		$this->setDessenha($row['dessenha']);
    		$this->setDtcadastro(new DateTime($row['dtcadastro']));
    	}
    }

    public function __toString(){

    	return json_encode(array(
    		"idusuario"=>$this->getIdusuario(),
    		"usuario"=>$this->getDeslogin(),
    		"Senha"=>$this->getDessenha(),
    		"data do cadastro"=>$this->getDtcadastro()->format("d-m-Y G:i:s")
    	));

    }
}