<?php 
namespace AppBundle\Entity; 
use Doctrine\ORM\Mapping as ORM;  

/** 
   * @ORM\Entity 
   * @ORM\Table(name = "Entreprise") 
*/  
class Entreprise { 
   /** 
      * @ORM\Column(type = "integer") 
      * @ORM\Id 
      * @ORM\GeneratedValue(strategy = "AUTO") 
   */ 
   protected $id;  
   
   /** 
      * @ORM\Column(type = "string", length = 50) 
   */ 
   protected $name;  
    
   /** 
      * @ORM\Column(type = "string", length = 50) 
   */ 
      
   protected $villeimm;
   /** 
      * @ORM\Column(type = "integer", scale = 2) 
   */ 
   protected $numsiren; 
   /** 
      * @ORM\Column(type = "datetime", scale = 2) 
   */ 
   protected $date; 
   /** 
      * @ORM\Column(type = "datetime", scale = 2) 
   */ 
   protected $dateimm;
   /** 
      * @ORM\Column(type = "decimal", scale = 2) 
   */ 
   protected $capitale; 
}  